<?php

/**
 * LbConfig : Manage config file
 *
 * @package    LbConfig
 * @version    v1.00
 * @author     Julien Huriez
 * @license    MIT License
 * @copyright  2014 Julien Huriez
 * @link   https://github.com/jhuriez/fuel-lbConfig-package
 */
Autoloader::add_core_namespace('LbConfig');

// Load config
\Config::load('lbconfig', true);

$configs = \Config::get('lbconfig.configs');

// Fetch all config
foreach($configs as $config)
{
	$file = $config['file'];

	// Load config file
	if ($file == 'config')
	{
		\Config::load('config');
	}
	else
	{
		\Config::load($file, $file);
	}

	// Set all config attribute
	$separator = \Config::get('lbconfig.separator', '>');
    foreach($config['list'] as $key => $value)
    {
    	$value = $value['value'];

    	// Change the separator with "."
		$key = str_replace($separator, '.', $key); 

    	if ($file == 'config')
    	{
    		\Config::set($key, $value);
    	}
    	else
    	{
	        \Config::set($file.'.'.$key, $value);
    	}
    }
}

/* End of file bootstrap.php */
