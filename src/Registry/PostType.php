<?php

namespace WPKit\Registry;

class PostType extends Registration {
    
    /**
     * The taxonomies to register post type on
     *
     * @var array
     */
    var $taxonomies = array();
    
    /**
     * Retrieve default options for register_post_type function
     *
     * @return array
	 */
    protected function getDefaultOptions() {
	    
	    return array(
			'rewrite' 		=> array( 'slug' => $this->slug ),
			'has_archive'   => sanitize_title( $this->plural ),
	    );
	    
    }
    
    /**
     * Retrieve default labels for register_post_type function
     *
     * @return array
	 */
    protected function getDefaultLabels() {
	    
	    return array(
			'name'               => _x( $this->plural, $this->slug, 'wpkit' ),
			'singular_name'      => _x( $this->name, $this->slug, 'wpkit' ),
			'menu_name'          => _x( $this->plural, 'admin menu', 'wpkit' ),
			'name_admin_bar'     => _x( $this->name, 'add new on admin bar', 'wpkit' ),
			'add_new'            => _x( 'Add New', $this->slug, 'wpkit' ),
			'add_new_item'       => __( 'Add New '. $this->name, 'wpkit' ),
			'new_item'           => __( 'New ' . $this->name, 'wpkit' ),
			'edit_item'          => __( 'Edit ' . $this->name, 'wpkit' ),
			'view_item'          => __( 'View ' . $this->name, 'wpkit' ),
			'all_items'          => __( 'All '. $this->plural, 'wpkit' ),
			'search_items'       => __( 'Search ' . $this->plural, 'wpkit' ),
			'parent_item_colon'  => __( 'Parent ' . $this->plural . ':', 'wpkit' ),
			'not_found'          => __( 'No ' . strtolower( $this->plural ) . ' found.', 'wpkit' ),
			'not_found_in_trash' => __( 'No ' . strtolower( $this->plural ) . ' found in Trash.', 'wpkit' )
		);
	    
    }
    
}