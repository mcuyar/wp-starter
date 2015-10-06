<?php

use \Foundation\App;
use \Services\Url;

/**
 * Autoload composer classes
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * The root public folder
 *
 * @var string
 */
$path = dirname( __FILE__ );

/**
 * Initialize the application by
 * loading the configuration parameters
 */
App::init();

/**
 * Define the absolute path for the application core
 */
App::config()->setAppDirectory($path.'/wp/');

/**
 * Custom Content Directory
 */
App::config()->setContentDirectory($path.'/content');

/**
 * Add the table prefix var for initialization
 */
$table_prefix = App::config()->get('DB_PREFIX');

/**
 * Error display
 */
if(App::environment() == 'local') {
    App::showErrors();
} else {
    App::hideErrors();
}

/**
 * Load a Memcached config if we have one
 */
if (file_exists($path.'/memcached-'.App::environment().'.php')) {
    $memcached_servers = include($path.'/memcached-'.App::environment().'.php');
}

/**
 * Bootstrap the wordpress core
 */
require_once(ABSPATH . 'wp-settings.php');