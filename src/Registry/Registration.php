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
     * The title of the registration
     *
     * @var string
     */
    public $title = null;
    
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
	    
	    $args = is_array($args) ? $args : ['name' => $args];
	     
	    $this->name = $this->name ? sanitize_title($this->name) : ( ! empty( $args['name'] ) ? $args['name'] : null );
	    
	    if( ! $this->name ) {
		    
		    throw new Exception( 'No name given for registration ' . get_called_class() );
		    
	    }
	    
	    $this->title = ! empty( $args['title'] ) ? $args['title'] : ( $this->title ?: Inflector::ucwords(str_replace('_', ' ', $this->name) ));
	    $this->plural = ! empty( $args['plural'] ) ? $args['plural'] : ( $this->plural ?: Inflector::pluralize($this->title) );
	    $this->singular = ! empty( $args['singular'] ) ? $args['singular'] : ( $this->singular ?: Inflector::singularize($this->title) );
	    
	    
	    $this->names = [
		    'name' => $this->name,
		    'singular' => $this->singular,
		    'plural' => $this->plural
	    ];
	    
	    $this->options = array_merge($this->getDefaultOptions(), ! empty( $args['options'] ) ? $args['options'] : $this->options);
	    $this->labels = array_merge($this->getDefaultLabels(), ! empty( $args['labels'] ) ? $args['labels'] : $this->labels);
	    
	    $this->booted();
	    
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
    
    public function booted() {}
    
}
