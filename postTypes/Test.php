<?php

namespace Theme\Taxonomies;

use WPKit\Registry\PostType;

class Test extends PostType {
  
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
	* https://codex.wordpress.org/Function_Reference/register_post_type#Arguments
	*/
	var $options = [
		'supports' => [ 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ]
	];
	
	/**
	* The labels of the registration
	*
	* @var array
	* https://codex.wordpress.org/Function_Reference/register_post_type#labels
	*/
	var $labels = [
		'menu_name' => 'The Tests',
	];
	
	/**
	* The slug of taxonomies in this registration
	*
	* @var array
	*/
	var $taxonomies = [
		'cat',
		'post_tag'
	];
}
