<?php
	
	namespace WPKit\Registry\PostType;
	
	use Themosis\PostType\PostTypeData;
	use Themosis\PostType\PostTypeServiceProvider as ServiceProvider;
	
	class PostTypeServiceProvider extends ServiceProvider {
		
	    public function register() {
		    
		    add_filter( 'themosis_service_providers', function( $providers ) {
			 
				unset( $providers[ array_search( PostTypeServiceProvider::class, $providers ) ] );
				
				return $providers;
			    
			} );
		    
	        $this->app->bind('posttype', function ($container) {
		        
	            $data = new PostTypeData();
	            
	            $view = $container['view'];
	            
	            $view = $view->make('_themosisCorePublishBox');
	            
	            return new PostTypeBuilder($container, $data, $container['metabox'], $view, $container['action'], $container['filter']);
	            
	        });
	        
	    }
	    
	}