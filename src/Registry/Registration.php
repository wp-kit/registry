<?php

namespace WPKit\Registry;

use Doctrine\Common\Inflector\Inflector;

class Registration {
    
    public $name = null;
    public $plural = null;
    public $singular = null;
    public $options = array();
    public $labels = array();
    
    private $names = array();
    
    public function __construct( $args = array() ) {
	    
	    $this->plural = ! empty( $args['plural'] ) ? $args['plural'] : ( $this->plural ? $this->plural ? Inflector::pluralize($this->name) );
	    $this->singular = ! empty( $args['singular'] ) ? $args['singular'] : ( $this->singular ? $this->singular ? Inflector::singularize($this->name) );
	    $this->slug = ! empty( $args['slug'] ) ? $args['slug'] : ( $this->slug ? $this->slug ? sanitize_title($this->name) );
	    
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