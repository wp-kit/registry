<?php

namespace Theme\Taxonomies;

use WPKit\Registry\Taxonomy;

class Test extends Taxonomy {
	
	/**
	* The name of the registration
	*
	* @var string
	*/
	var $name = 'test';
	
	/**
	* The plural name of the registration
	*
	* @var string
	*/
	var $plural = 'tests';
	
	/**
	* The singular name of the registration
	*
	* @var string
	*/
	var $singular = 'test';
	
	/**
	* The options of the registration
	*
	* @var array
	* https://codex.wordpress.org/Function_Reference/register_taxonomy#Arguments
	*/
	var $options = [
		'public' => false
	];
	
	/**
	* The labels of the registration
	*
	* @var array
	* https://codex.wordpress.org/Function_Reference/register_taxonomy#Arguments
	*/
	var $labels = [
		'menu_name' => 'The Test Categories',
	];
	
	/**
	* The slug of post types in this registration
	*
	* @var array
	*/
	var $post_types = [
		'test'
	];

}
