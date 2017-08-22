# wp-kit/registry

This is a [```Themosis```](http://framework.themosis.com/) PHP Component that enhances [```PostType```](http://framework.themosis.com/docs/1.3/posttype/) and [```Taxonomy```](http://framework.themosis.com/docs/1.3/taxonomy/) generation.

```Themosis``` already has a [```PostTypeBuilder```](https://github.com/themosis/framework/blob/master/src/Themosis/PostType/PostTypeBuilder.php) and a [```TaxonomyBuilder```](https://github.com/themosis/framework/blob/master/src/Themosis/Taxonomy/TaxonomyBuilder.php) but ```wp-kit/registry``` just simplifies the process by using [```doctrine/inflector```](https://github.com/doctrine/inflector) so that the only argument required to generate a ```PostType``` or ```Taxonomy``` is the name. 

## Installation

Install via [```Composer```](https://getcomposer.org/) in the root of your ```Themosis``` installation:

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

Just as within ```Themosis```, we add a file within resources but instead of calling the ```::make``` method we call the [```::generate```](https://github.com/wp-kit/registry/blob/master/src/Registry/PostType/PostTypeBuilder.php#L21) method:

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
