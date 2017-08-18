# wp-kit/registry

This is a ```Themosis``` PHP Component that handles ```PostType``` and ```Taxonomy``` registration.

```Themosis``` already has a ```PostTypeBuilder``` and a ```TaxonomyBuilder``` but this repo just simplifies the process by using ```doctrine/inflector``` so that the only argument required to generate a ```PostType``` or ```Taxonomy``` is the name. 

## Installation

Install via ```Composer``` in the root of your ```Themosis``` installation:

```php
composer require "wp-kit/registry"
```

## Setup

### Add Service Provider

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

## Usage

Just as within ```Themosis```, we add a file within resources but instead of calling the ```::make``` method we call the ```::generate``` method:

```php
// File stored in resources/admin/books.php
PostType::generate('books');
```

Exactly the same approach can be used for ```Taxonomies```:

```php
// File stored in resources/admin/authors.php
Taxonomy::generate('authors', 'books');
```

## Requirements

Wordpress 4+

PHP 5.6+

## License

wp-kit/registry is open-sourced software licensed under the MIT License.
