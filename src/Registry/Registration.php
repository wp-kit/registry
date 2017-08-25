<?php

namespace WPKit\Registry;

use Doctrine\Common\Inflector\Inflector;
use Exception;

class Registration {
    
    public $name = null;
    public $plural = null;
    public $singular = null;
    public $options = array();
    public $labels = array();
    
    private $names = array();
    
    public function __construct( $args = array() ) {
	    
	    $args = is_array($args) ? $args : ['name' => $args];
	     
	    $this->slug = ! empty( $args['slug'] ) ? $args['slug'] : ( $this->slug ? sanitize_title($this->slug) : null );
	    
	    if( ! $this->slug ) {
		    
		    throw new Exception( 'No slug given for registration ' . get_called_class() );
		    
	    }
	    
	    $this->name = ! empty( $args['name'] ) ? $args['name'] : Inflector::ucwords($this->slug);
	    $this->plural = ! empty( $args['plural'] ) ? $args['plural'] : ( $this->plural ? $this->plural : Inflector::pluralize($this->name) );
	    $this->singular = ! empty( $args['singular'] ) ? $args['singular'] : ( $this->singular ? $this->singular :? Inflector::singularize($this->name) );
	    
	    
	    $this->names = [
		    'name' => $this->name,
		    'singular' => $this->singular,
		    'plural' => $this->plural,
		    'slug' => $this->slug
	    ];
	    
	    $this->options = array_merge($this->getDefaultOptions(), ! empty( $args['options'] ) ? $args['options'] : $this->options);
	    $this->labels = array_merge($this->getDefaultLabels(), ! empty( $args['labels'] ) ? $args['labels'] : $this->labels);
	    
    }
    
    public function get($key, $default = null) {
	    
	    return property_exists($this, $key) ? $this->$key : $default;
	    
    }
    
}
