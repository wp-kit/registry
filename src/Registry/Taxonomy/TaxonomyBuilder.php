<?php
	
	namespace WPKit\Registry\Taxonomy;
	
	use Themosis\Taxonomy\TaxonomyBuilder as BaseTaxonomyBuilder;
	use Doctrine\Common\Inflector\Inflector;
	
	class TaxomnomyBuilder extends BaseTaxonomyBuilder {
		
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
	    public function generate($name, $postType, $plural = '', $singular = '')
	    {
		    
	        $plural = $plural ? $plural : Inflector::pluralize($name);
	        $singular = $singular ? $singular : Inflector::singularize($name);
	        
	        return $this->make($name, $postType, $plural, $singular);
	        
	    }
		
	}