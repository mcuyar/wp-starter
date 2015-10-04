<?php

/**
 * Load database info and local development parameters
 */

$path = dirname( __FILE__ );

if ( file_exists( $path . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
    include( $path . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );
	
	ini_set( 'display_errors', 0 );
	define('WP_DEBUG', false);
}

define( 'DB_NAME', getenv('DB_NAME'));
define( 'DB_USER', getenv('DB_USER'));
define( 'DB_PASSWORD', getenv('DB_PASSWORD'));
define( 'DB_HOST', getenv('DB_HOST'));
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

// ================================================
// You almost certainly do not want to change these
// ================================================


// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         'zf%-.ok4k *ZT!yWo}U0%BPfwSaf6g$z?w60BSzu S@U+ckKS6[jjl>h5o|(qEm}');
define('SECURE_AUTH_KEY',  '8%B% b;p[+X4m-0GiC<iX4|xs<;RtLgFE^FXD8Lo>3rmuN!WO;)bX!2:s@-C[WcC');
define('LOGGED_IN_KEY',    'h-DoA+3FWV0@~ZH|:Obkr-W?9jvT5~A{|!>1o:wp!}U$ 8~IP#w:VACn3_-;{TSI');
define('NONCE_KEY',        'w$v6$3WyUgY1`pEg0|Yy]b{)3$L$6FL1Tbg|GM4,R?2])YPqQ?2VEGD[7zFjv<Xv');
define('AUTH_SALT',        '2sk.(U6Q*L5x-EO2=JwJ>U.@V^XlhtZTm3tT*O%texWcz:@v?JY!PYYC/9.`Z@lL');
define('SECURE_AUTH_SALT', 'OZO4t2(@p!_P{ORU GBha/VfM?X%<ktc8(oq`-+=QX2u*zwhlCz(Qv~jm#5Y(]uO');
define('LOGGED_IN_SALT',   'zs-!rthh+9xq@]1>d/tY3i|0tW w_TNQAYrVQFa7*QJrs hm^R+V-<nI~%WNiq.V');
define('NONCE_SALT',       'VyUW0St|kr<>O%gc3l0@#V,w{7I157XOr)!L8ZJkCZNI.+FUdIOW1g98el$-s7FZ');

// ==============================================================
// Memory Limit 
// ==============================================================
define('WP_MEMORY_LIMIT', '32M');

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
//ini_set( 'display_errors', 0 );
//define('WP_DEBUG', false);
//define( 'WP_DEBUG_DISPLAY', true );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
