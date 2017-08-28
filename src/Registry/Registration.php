<?php

namespace WPKit\Registry;

use Doctrine\Common\Inflector\Inflector;
use Exception;

class Registration {
    
    /**
     * The name of the registration
     *
     * @var string
     */
    public $name = null;
    
    /**
     * The plural name of the registration
     *
     * @var string
     */
    public $plural = null;
    
    /**
     * The singular name of the registration
     *
     * @var string
     */
    public $singular = null;
    
    /**
     * The options for the registration
     *
     * @var array
     */
    public $options = array();
    
    /**
     * The labels for the registration
     *
     * @var array
     */
    public $labels = array();
    
    /**
     * The names of the registration
     *
     * @var array
     */
    private $names = array();
    
    /**
     * The constructor, it runs the whole registration
     *
     * @param array $args
     * @return void
	 */
    public function __construct( $args = array() ) {
	    
	    $args = is_array($args) ? $args : ['slug' => $args];
	     
	    $this->slug = ! empty( $args['slug'] ) ? $args['slug'] : ( $this->slug ? sanitize_title($this->slug) : null );
	    
	    if( ! $this->slug ) {
		    
		    throw new Exception( 'No slug given for registration ' . get_called_class() );
		    
	    }
	    
	    $this->name = ! empty( $args['name'] ) ? $args['name'] : Inflector::ucwords($this->slug);
	    $this->plural = ! empty( $args['plural'] ) ? $args['plural'] : ( $this->plural ? $this->plural : Inflector::pluralize($this->name) );
	    $this->singular = ! empty( $args['singular'] ) ? $args['singular'] : ( $this->singular ? $this->singular : Inflector::singularize($this->name) );
	    
	    
	    $this->names = [
		    'name' => $this->name,
		    'singular' => $this->singular,
		    'plural' => $this->plural,
		    'slug' => $this->slug
	    ];
	    
	    $this->options = array_merge($this->getDefaultOptions(), ! empty( $args['options'] ) ? $args['options'] : $this->options);
	    $this->labels = array_merge($this->getDefaultLabels(), ! empty( $args['labels'] ) ? $args['labels'] : $this->labels);
	    
    }
    
    /**
     * Get method for public retrieval of data
     *
     * @param string $key
     * @param string $default
     * @return mixed
	 */
    public function get($key, $default = null) {
	    
	    return property_exists($this, $key) ? $this->$key : $default;
	    
    }
    
}
