<?php

namespace Theme\Taxonomies;

use WPKit\Registry\Taxonomy;

class Test extends Taxonomy {
	
	/**
     * The post types to register taxonomy on
     *
     * @var array
     */
	var $post_types = [
		'test'
	];

}