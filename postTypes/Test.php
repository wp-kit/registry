<?php

namespace Theme\Taxonomies;

use WPKit\Registry\PostType;

class Test extends PostType {
  var $name = 'test';
  var $plural = 'tests';
  var $singular = 'test';
  var $options = [
    'supports' => [ 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ]
  ];
  var $labels = [
    'menu_name' => 'The Tests',
  ];
  var $taxonomies = [
    'cat',
    'post_tag'
  ];
}
