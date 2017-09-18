<?php

namespace WPKit\Registry;

class Taxonomy extends Registration {
    
    /**
     * The post types to register taxonomy on
     *
     * @var array
     */
    public $post_types = array(
	    'post'
    );
    
    /**
     * The constructor, it runs the whole registration for taxonomy
     *
     * @param array $args
     * @return void
	 */
    public function __construct( $args = array() ) {
	    
	    parent::__construct( $args );
	    
	    $this->options['labels'] = $this->labels;
	    
    }
    
    /**
     * Retrieve default options for register_taxonomy function
     *
     * @return array
	 */
    protected function getDefaultOptions() {
	    
	    return array(
			'rewrite' => array( 'slug' => $this->name ),
	    );
	    
    }
    
    /**
     * Retrieve default labels for register_taxonomy function
     *
     * @return array
	 */
    protected function getDefaultLabels() {
	    
	    return array(
			'name'              => _x( $this->plural, 'wpkit' ),
			'singular_name'     => _x( $this->singular, 'wpkit' ),
			'search_items'      => __( 'Search '.$this->plural ),
			'all_items'         => __( 'All ' . $this->plural ),
			'parent_item'       => __( 'Parent ' . $this->singular ),
			'parent_item_colon' => __( 'Parent ' . $this->singular.':' ),
			'edit_item'         => __( 'Edit ' . $this->singular ),
			'update_item'       => __( 'Update ' . $this->singular ),
			'add_new_item'      => __( 'Add New ' . $this->singular ),
			'new_item_name'     => __( 'New ' . $this->singular . ' Name' ),
			'menu_name'         => __( $this->plural ),
		);
	    
    }
    
}
