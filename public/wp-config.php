<?php

use Foundation\App;
use Foundation\Security;

/**
 * Autoload composer classes
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * The root public folder
 *
 * @var string
 */
$config = __DIR__ . '/../app/config/';

/**
 * Initialize the application by
 * loading the configuration parameters
 */
$app = App::load($config . 'app.php');

/**
 * Add the table prefix var for initialization
 */
$table_prefix = DB_PREFIX;

/**
 * Bootstrap the wordpress core
 */
require_once(ABSPATH . 'wp-settings.php');