<?php

namespace WPKit\Registry;

class Taxonomy extends Registration {
    
    public $post_types = array();
    
    public function __construct( $args = array() ) {
	    
	    parent::__construct( $args );
	    
	    $this->options['labels'] = $this->labels;
	    
    }
    
}