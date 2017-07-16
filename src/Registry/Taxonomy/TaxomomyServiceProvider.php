<?php
	
	namespace WPKit\Registry\Taxonomy;
	
	use Themosis\Taxonomy\TaxonomyData;
	use Themosis\Taxonomy\TaxonomyServiceProvider as ServiceProvider;
	
	class TaxonomyServiceProvider extends ServiceProvider {
		
	    public function register() {
		    
		    add_filter( 'themosis_service_providers', function( $providers ) {
			 
				unset( $providers[ array_search( TaxonomyServiceProvider::class, $providers ) ] );
				
				return $providers;
			    
			} );
		    
	        $this->app->bind('taxonomy', function ($container) {
		        
	            $data = new TaxonomyData();
	            
	            return new TaxonomyBuilder($container, $data, $container['action'], $container['validation'], $container['view']);
	            
	        });
	        
	    }
	    
	}