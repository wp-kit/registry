<?php

namespace Theme\Taxonomies;

use WPKit\Registry\Taxonomy;

class Test extends Taxonomy {
	
	var $name = 'test';
	var $plural = 'tests';
	var $singular = 'test';
	var $options = [
		'public' => false
	];
	var $labels = [
		'menu_name' => 'The Test Categories',
	];
	var $post_types = [
		'test'
	];

}
