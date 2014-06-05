# fuel LbConfig

fuel-lbConfig-package is a package for easily managing config file in FuelPHP.

## Installation

* Clone or download the fuel-lbConfig-package repository
* Move it into your packages folder, and rename it to "lbConfig"
* Add 'lbConfig' to the 'always_load.packages' array in app/config/config.php at first position (important!).
* Open fuel/app/bootstrap.php and replace these lines : 

```php
// Initialize the framework with the config file.
Fuel::init('config.php');
```

by

```php
\Config::load('config.php');
\Package::load('lbConfig');

// Initialize the framework with the config file.
Fuel::init('config');
```

## How it's work

1. You will add all config key you want to manage in your backoffice, in the lbConfig config file.
2. In first, FuelPHP will load the config.php
3. And load the package lbConfig, which will read the lbConfig config file, and override all config keys before Fuel::init()

## Configuration

Copy/paste the lbconfig.php file in your app/config folder, and edit it :

All config keys need to be in the key "configs"

### Simple Example

```php
'configs' => 
	array(
		'config' => 
		array(
			'file' => 'config', // The name of the config file (here config.php)
			'module' => 
			array(
				'tab' => 'App', // The name of the tab in bootstrap 3 (for config module)
				'panel' => 'Config', // The name of the panel in bootstrap 3
			),
			// All config keys here :
			'list' => 
			array(
				// The key is 'profiling', for activate or not Fuel Profiler
				'profiling' => 
				array(
					'value' => true,
				),
			),
		),
	),
```

[Screenshot](http://i.imgur.com/d1lYKR2.png)

### Add label

```php
	'profiling' => 
	array(
		'label' => 'Use profiler ?',
		'value' => true,
	),
```

[Screenshot](http://i.imgur.com/C2uVSMC.png)


### Customize panel and tab

```php
	'profiling' => 
	array(
		'label' => 'Use profiler ?',
		'panel' => 'Profiler', // I don't want to use the panel "Config"
		'value' => true,
	),
```

[Screenshot](http://i.imgur.com/2AQwHMf.png)

### Use select input

```php
	'language' => 
	array(
		'label' => 'Language',
		'value' => 'fr',
		'values' => 
		array(
			0 => 'en',
			1 => 'fr',
			'Japonais' => 'jp',
		),
	),
```

[Screenshot](http://i.imgur.com/rHrcGcF.png)


### Use the separator

For example you want to manage the key "cookie.expiration" in config.php :
```php
	'cookie.expiration' => 
	array(
		'label' => 'Cookie expiration',
		'value' => 0,
	),
```

[Screenshot](http://i.imgur.com/Rfr11xZ.png)

Will not work ! You can use "." as separator. The default separator is ">" :

```php
	'cookie>expiration' => 
	array(
		'label' => 'Cookie expiration',
		'value' => 0,
	),
```

Will work ! You can customize the separator in the config key : lbconfig.separator

### Rules validation

You can use rules validations like that :

```php
	'cookie>expiration' => 
	array(
		'label' => 'Cookie expiration',
		'value' => 0,
		'rules' => array(
			array('required'),
			array('valid_string', array('numeric')),
			array('numeric_min', 0),
		),
	),
```

it's only for the lbConfig module

### With other file config

Want to use the key in other file config ? 

```php
'configs' => 
	array(
		// The config file
		'config' => 
		array(
			'file' => 'config', // The name of the config file (here config.php)
			'module' => 
			array(
				'tab' => 'App', // The name of the tab in bootstrap 3 (for config module)
				'panel' => 'Config', // The name of the panel in bootstrap 3
			),
			// All config keys here :
			'list' => 
			array(
				// The key is 'profiling', for activate or not Fuel Profiler
				'profiling' => 
				array(
					'value' => true,
				),
			),
		),

		// Image config file
		'image' => 
		array(
			'file' => 'image', // The name of the config file (here image.php)
			'module' => 
			array(
				'tab' => 'Image', // The name of the tab in bootstrap 3 (for config module)
				'panel' => 'Config', // The name of the panel in bootstrap 3
			),
			// All config keys here :
			'list' => 
			array(
				// The key is 'quality' (image.quality), for choose the active theme
				'quality' => 
				array(
					'value' => 100,
				),
			),
		),
	),
```

(Screenshot)[http://i.imgur.com/qm6YUMf.png]

## lbConfig Module

For manage easily this package, you need to install the lbConfig module [here](http://github.com/jhuriez/fuel-config-module)