# wp-kit/registry

This is a wp-kit component that handles [```PostType```](http://framework.themosis.com/docs/1.3/posttype/) and [```Taxonomy```](http://framework.themosis.com/docs/1.3/taxonomy/) registration.

```wp-kit/registry``` is fully comptaible with [```Themosis```](http://framework.themosis.com/) and if you are using ```Themosis``` you'll notice it already has a [```PostTypeBuilder```](https://github.com/themosis/framework/blob/master/src/Themosis/PostType/PostTypeBuilder.php) and a [```TaxonomyBuilder```](https://github.com/themosis/framework/blob/master/src/Themosis/Taxonomy/TaxonomyBuilder.php) but ```wp-kit/registry``` just simplifies the process by providing an [OOP](https://en.wikipedia.org/wiki/Object-oriented_programming) approach to registering ```PostTypes``` and ```Taxonomies```.

## Installation

If you're using ```Themosis```, install via [```Composer```](https://getcomposer.org/) in the ```Themosis``` route folder, otherwise install in your ```Composer``` driven theme folder:


```php
composer require "wp-kit/registry"
```

## Setup

### Add Service Provider

Just register the service provider and facade in the providers config and theme config:

```php
//inside theme/resources/config/providers.config.php

return [
    //
    WPKit\Registry\RegistryServiceProvider::class,
    //
];
```

### Add PRS4 Class Reference (Themosis Only)

Just add the following line to ```resources/config/loading.config.php``` in the ```Themosis``` theme folder:

```php
'Theme\\Taxonomies\\' => themosis_path('theme.resources').'taxonomies',
'Theme\\PostTypes\\' => themosis_path('theme.resources').'postTypes',
```

### Add Config & View File

The recommended method of installing config files for ```wp-kit``` components is via ```wp-kit/vendor-publish``` command.

First, [install WP CLI](http://wp-cli.org/), and then install the package via:

```wp package install wp-kit/vendor-publish```

Once installed you can run:

```wp kit vendor:publish```

For more information, please visit [wp-kit/vendor-publish](https://github.com/wp-kit/vendor-publish).

Alternatively, you can place the [config file(s)](config), [shortcode file(s)](shortcodes) and [view file(s)](views) in your ```theme/resources/config```, ```theme/resources/shortcodes``` and ```theme/resources/views``` directories manually.

## Usage

### Adding Classes

```wp-kit\registry``` comes with two classes that can extended, [```WPKit\Registry\PostType```](src/Registry/PostType.php) and [```WPKit\Registry\Taxonomy```](src/Registry/Taxonomy.php). 

Any custom ```PostTypes``` and ```Taxonomies``` should be added inside ```resources/shortcodes``` within the namespace ```Theme\PostType``` or ```Theme\Taxonomy```. 

[Here is an example PostType class](postTypes/Test.php).

[Here is an example Taxonomy class](taxonomies/Test.php).

## Requirements

Wordpress 4+

PHP 5.6+

## License

wp-kit/registry is open-sourced software licensed under the MIT License.
