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
 * Set the database parameters
 */
$table_prefix  = 'xBa3_';

define( 'DB_NAME', getenv('DB_NAME'));
define( 'DB_USER', getenv('DB_USER'));
define( 'DB_PASSWORD', getenv('DB_PASSWORD'));
define( 'DB_HOST', getenv('DB_HOST'));

define( 'DB_CHARSET', 'utf8' ); // You almost certainly do not want to change this
define( 'DB_COLLATE', '' ); // You almost certainly do not want to change this

/**
 * Memory limit
 */
App::config()->setMemoryLimit(32);

/**
 * Define the absolute path for the application core
 */
App::config()->setAppDirectory($path.'/wp/');

/**
 * Custom Content Directory
 */
App::config()->setContentDirectory($path.'/content');

/**
 * Salts, for security
 * Grab these from: https://api.wordpress.org/secret-key/1.1/salt
 */
define('AUTH_KEY',         'zf%-.ok4k *ZT!yWo}U0%BPfwSaf6g$z?w60BSzu S@U+ckKS6[jjl>h5o|(qEm}');
define('SECURE_AUTH_KEY',  '8%B% b;p[+X4m-0GiC<iX4|xs<;RtLgFE^FXD8Lo>3rmuN!WO;)bX!2:s@-C[WcC');
define('LOGGED_IN_KEY',    'h-DoA+3FWV0@~ZH|:Obkr-W?9jvT5~A{|!>1o:wp!}U$ 8~IP#w:VACn3_-;{TSI');
define('NONCE_KEY',        'w$v6$3WyUgY1`pEg0|Yy]b{)3$L$6FL1Tbg|GM4,R?2])YPqQ?2VEGD[7zFjv<Xv');
define('AUTH_SALT',        '2sk.(U6Q*L5x-EO2=JwJ>U.@V^XlhtZTm3tT*O%texWcz:@v?JY!PYYC/9.`Z@lL');
define('SECURE_AUTH_SALT', 'OZO4t2(@p!_P{ORU GBha/VfM?X%<ktc8(oq`-+=QX2u*zwhlCz(Qv~jm#5Y(]uO');
define('LOGGED_IN_SALT',   'zs-!rthh+9xq@]1>d/tY3i|0tW w_TNQAYrVQFa7*QJrs hm^R+V-<nI~%WNiq.V');
define('NONCE_SALT',       'VyUW0St|kr<>O%gc3l0@#V,w{7I157XOr)!L8ZJkCZNI.+FUdIOW1g98el$-s7FZ');

/**
 * Language
 * Leave blank for American English
 */
App::config()->setLanguage('');

/**
 * Error display
 */
if(App::environment() == 'local') {
    App::showErrors();
} else {
    App::hideErrors();
}

/**
 * Secure login and Admin sections
 * if available
 */
if(Url::isSecure()) {
    App::forceSSLAdmin();
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