# WPKit Registry

This is a Themosis PHP Component that handles Post Type and Taxonomy Registration.

Themosis already has a PostTypeBuilder and TaxonomyBuilder but this repo just simplifies the process by using Doctrine Inflector so that the only argument required to generate a PostType or Taxonomy is the name. 

## Installation

If you're using Themosis, install via composer in the Themosis route folder, otherwise install in your theme folder:

```php
composer require "wp-kit/registry"
```

## Registering Service Provider

**Within Themosis Theme**

Just register the service provider and facade in the providers config and theme config:

```php
//inside themosis-theme/resources/config/providers.config.php

return [
    //
    WPKit\Registry\PostType\PostTypeServiceProvider::class,
    WPKit\Registry\Taxonomy\TaxonomyServiceProvider::class,
    //
];
```

## Using PostTypeBuilder / TaxonomyBuilder

Just as within Themosis, we add a file within resources but instead of calling the ::make method we call the ::generate method:

```php
// File stored in resources/admin/books.php
PostType::generate('books');
```

Exactly the same approach can be used for Taxonomies:

```php
// File stored in resources/admin/authors.php
Taxonomy::generate('authors', 'books');
```

## Requirements

Wordpress 4+

PHP 5.6+

## License

WPKit Registry is open-sourced software licensed under the MIT License.
