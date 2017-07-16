<?php
	
	namespace WPKit\Registry\PostType;
	
	use Themosis\PostType\PostTypeBuilder as BasePostTypeBuilder;
	use Doctrine\Common\Inflector\Inflector;
	
	class PostTypeBuilder extends BasePostTypeBuilder {
		
		/**
	     * Define a new custom post type.
	     *
	     * @param string $name     The post type slug name.
	     * @param string $plural   The post type plural name for display.
	     * @param string $singular The post type singular name for display.
	     *
	     * @throws PostTypeException
	     *
	     * @return \Themosis\PostType\PostTypeBuilder
	     */
	    public function generate($name, $plural = '', $singular = '')
	    {
		    
	        $plural = $plural ? $plural : Inflector::pluralize($name);
	        $singular = $singular ? $singular : Inflector::singularize($name);
	        
	        return $this->make($name, $plural, $singular);
	        
	    }
		
	}