<?php
	
	namespace WPKit\Registry;
	
	use Illuminate\Support\ServiceProvider;
	use PostTypes\PostType as Service;
	use Themosis\Facades\PostType as PostTypeFacade;
	use Themosis\Facades\Taxonomy as TaxonomyFacade;
	
	class RegistryServiceProvider extends ServiceProvider {
		
		protected $postTypes = [];
		
		/**
	     * Boot the service provider.
	     *
	     * @return void
	     */
		public function boot() {
		
			$this->publishes([
				__DIR__.'/../../config/registry.config.php' => config_path('registry.config.php')
			], 'config');
			
			$this->publishes([
				__DIR__.'/../../postTypes/Test.php' => posttype_path('Test.php')
			], 'posttypes');
			
			$this->publishes([
				__DIR__.'/../../taxonomies/Test.php' => taxonomy_path('Test.php')
			], 'taxonomies');

		}
		
		/**
	     * Register the service provider.
	     *
	     * @return void
	     */
		public function register() {
			
			if( defined( 'WP_CLI' ) && WP_CLI ) {
				
				return false;
				
			}
			
			$post_types = $this->app['config']['registry']['post_types'];
			$taxonomies = $this->app['config']['registry']['taxonomies'];
			
			array_map(array($this, 'registerPostType'), array_keys($post_types), $post_types);
			array_map(array($this, 'registerTaxonomy'), array_keys($taxonomies), $taxonomies);
			
		}
		
		/**
	     * Register a post type
	     *
	     * @param string $key
	     * @param string|array $post_type
	     * @return void
	     */
		protected function registerPostType($name, $post_type) {
			
			$post_type = is_array( $post_type ) ? new PostType($post_type) : new $post_type($name);
			
			/**
			 * Check if we're using Themosis
			**/
			if( class_exists( PostTypeFacade::class ) ) {
				
				PostTypeFacade::make($post_type->get('name'), $post_type->get('plural'), $post_type->get('singular'))->set(array_merge($post_type->get('options'), [
					'labels' => $post_type->get('labels')
				]));
				
			} else {
			
				$object = new Service($post_type->get('names'), $post_type->get('options'), $post_type->get('labels'));
				
				foreach( $post_type->get('taxonomies') as $key => $taxonomy ) {
					
					$taxonomy = new Taxonomy($taxonomy);
						
					$object->taxonomy($taxonomy->get('name'), $taxonomy->get('options'));
					
				}
				
				$this->postTypes[$name] = $object;
				
			}
			
		}
		
		/**
	     * Register a taxonomy
	     *
	     * @param string $key
	     * @param string|array $taxonomy
	     * @return void
	     */
		protected function registerTaxonomy($key, $taxonomy) {
			
			$taxonomy = is_array( $taxonomy ) ? new Taxonomy($taxonomy) : new $taxonomy($key);
			
			/**
			 * Check if we're using Themosis
			**/
			if( class_exists( TaxonomyFacade::class ) ) {
				
				TaxonomyFacade::make($taxonomy->get('name'), $taxonomy->get('post_types'), $taxonomy->get('plural'), $taxonomy->get('singular'))->set($taxonomy->get('options'));
				
			} else {
			
				foreach( $taxonomy->get('post_types') as $post_type ) {
						
					$post_type = ! empty( $this->postTypes[$post_type] ) ? $this->postTypes[$post_type] : new Service($post_type);
					
					$post_type->taxonomy($taxonomy->get('name'), $taxonomy->get('options'));
					
				}
				
			}
			
		}
		
	}
