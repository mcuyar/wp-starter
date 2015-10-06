<?php

use Services\Url;
use Services\Env;

return [

    /*
	|--------------------------------------------------------------------------
	| Wordpress Database Parameters
	|--------------------------------------------------------------------------
	*/
    'DB_NAME' => Env::get('DB_NAME', 'wp_starter'),
    'DB_USER' =>  Env::get('DB_USER', 'root'),
    'DB_PASSWORD' => Env::get('DB_PASSWORD', 'secret'),
    'DB_HOST' => Env::get('DB_HOST', 'localhost'),
    'DB_PREFIX' => Env::get('DB_PREFIX', 'xBa3_'),
    'DB_CHARSET' => 'utf8', // You almost certainly do not want to change this
    'DB_COLLATE' => '', // You almost certainly do not want to change this

    /*
	|--------------------------------------------------------------------------
	| Wordpress Memory Limits
	|--------------------------------------------------------------------------
	*/
    'WP_MEMORY_LIMIT' => '64M',
    'WP_MAX_MEMORY_LIMIT' => '256M',

    /*
	|--------------------------------------------------------------------------
	| Application Cache
	|--------------------------------------------------------------------------
    | Allows for custom application cache by loading the advanced-cache.php in the WP_CONTENT_DIR
	| Wordpress will also run wp_cache_postload() if object cache is enabled and the function exists.
	*/
    'WP_CACHE' => false,

    /*
	|--------------------------------------------------------------------------
	| Language
	|--------------------------------------------------------------------------
    | Set the default wordpress language
    | Leave blank for default
	*/
    'WPLANG' => '',

    /*
	|--------------------------------------------------------------------------
	| Secure Salts
	|--------------------------------------------------------------------------
    | Grab these from: https://api.wordpress.org/secret-key/1.1/salt
	*/
    'AUTH_KEY' => 'zf%-.ok4k *ZT!yWo}U0%BPfwSaf6g$z?w60BSzu S@U+ckKS6[jjl>h5o|(qEm}',
    'SECURE_AUTH_KEY' => '8%B% b,p[+X4m-0GiC<iX4|xs<,RtLgFE^FXD8Lo>3rmuN!WO,)bX!2:s@-C[WcC',
    'LOGGED_IN_KEY' => 'h-DoA+3FWV0@~ZH|:Obkr-W?9jvT5~A{|!>1o:wp!}U$ 8~IP#w:VACn3_-,{TSI',
    'NONCE_KEY' => 'w$v6$3WyUgY1`pEg0|Yy]b{)3$L$6FL1Tbg|GM4,R?2])YPqQ?2VEGD[7zFjv<Xv',
    'AUTH_SALT' => '2sk.(U6Q*L5x-EO2=JwJ>U.@V^XlhtZTm3tT*O%texWcz:@v?JY!PYYC/9.`Z@lL',
    'SECURE_AUTH_SALT' => 'OZO4t2(@p!_P{ORU GBha/VfM?X%<ktc8(oq`-+=QX2u*zwhlCz(Qv~jm#5Y(]uO',
    'LOGGED_IN_SALT' => 'zs-!rthh+9xq@]1>d/tY3i|0tW w_TNQAYrVQFa7*QJrs hm^R+V-<nI~%WNiq.V',
    'NONCE_SALT' => 'VyUW0St|kr<>O%gc3l0@#V,w{7I157XOr)!L8ZJkCZNI.+FUdIOW1g98el$-s7FZ',

    /*
	|--------------------------------------------------------------------------
	| SSL Security Options
	|--------------------------------------------------------------------------
    | Grab these from: https://api.wordpress.org/secret-key/1.1/salt
	*/
    'FORCE_SSL_ADMIN' 	=> Url::isSecure(),
    'FORCE_SSL_LOGIN'	=> Url::isSecure(),

    /*
	|--------------------------------------------------------------------------
	| Theme Options
	|--------------------------------------------------------------------------
    | Set default wordpress theme
	*/
    'WP_DEFAULT_THEME' => null,

    /*
	|--------------------------------------------------------------------------
	| MulitSite Plugin Directory
	|--------------------------------------------------------------------------
    | Change the default location for mustuse plugins directory to allow
	| allow global app plugins to be installed
	|
	| The 'WPMU_PLUGIN_URL' Constant will be automatically
	*/
    'WPMU_PLUGIN_DIR' => realpath(__DIR__.'/../../plugins'),

    /*
	|--------------------------------------------------------------------------
	| Customization Options
	|--------------------------------------------------------------------------
    | Defines functionality related WordPress constants
	*/
    'AUTOSAVE_INTERVAL' 	=> 60,
    'EMPTY_TRASH_DAYS' 		=> 30,
    'WP_POST_REVISIONS' 	=> true,
    'WP_CRON_LOCK_TIMEOUT'	=> 60,

    /*
	|--------------------------------------------------------------------------
	| Cookies
	|--------------------------------------------------------------------------
    | Used to guarantee unique hash cookies
	|
	| @todo: need to figure out how to get this working
	*/
    //'COOKIEHASH' 	=> md5(WP_SITEURL),
    //'TEST_COOKIE' => 'wordpress_test_cookie',
    //'COOKIEPATH' 	=> preg_replace('|https?://[^/]+|i', '', WP_HOME . '/'),
    //'SITECOOKIEPATH' => preg_replace('|https?://[^/]+|i', '', WP_SITEURL . '/' ),
    //'COOKIE_DOMAIN' => false,
];