<?php namespace Foundation;

use Support\Config\AbstractFactory;
use Support\Url;

class App extends AbstractFactory {

    /**
     * Wordpress Database Parameters
     *
     * @var array
     */
    public $database = [];

    /**
     * Wordpress Memory Limits
     *
     * @var array
     */
    public $memory_limits = [];

    /**
     * Wordpress Debug
     *
     * @var bool
     */
    public $debug = false;

    /**
     * Application Cache
     *
     * @var array
     */
    public $cache = [];

    /**
     * Language
     *
     * @var array
     */
    public $language = '';

    /**
     * Secure Salts
     *
     * @var array
     */
    public $salts = [];

    /**
     * SSL Security Options
     *
     * @var array
     */
    public $ssl = [];

    /**
     * Theme Options
     *
     * @var array
     */
    public $theme = [];

    /**
     * MulitSite Plugin Directory
     *
     * @var array
     */
    public $multisite = [];

    /**
     * Customization Options
     *
     * @var array
     */
    public $custom = [];

    /**
     * Cookie Management
     *
     * @var array
     */
    public $cookie_management = [];

    public $app_directory;

    public $content_directory;

    /**
     * Get the current app environment
     *
     * @return string
     */
    public static function environment()
    {
        return getenv('APP_ENV') ?: 'production';
    }

    /**
     * Set the database configs
     *
     * @param array $config
     */
    protected function database(array $config)
    {
        $this->define($config);
    }

    /**
     * Set the memory limits
     *
     * @param array $config
     */
    protected function memoryLimits(array $config)
    {
        $this->define($config);
    }

    /**
     * Set to debug mode
     *
     * @param $bool
     */
    protected function debug($bool)
    {
        $bool = ($bool === true);

        ini_set('display_errors', (int) $bool);
        $this->define([
            'SAVEQUERIES' => $bool,
            'WP_DEBUG' => $bool,
            'WP_DEBUG_DISPLAY' => $bool
        ]);
    }

    /**
     * Use Cache?
     *
     * @param $bool
     */
    protected function cache($bool)
    {
        $this->define('WP_CACHE', $bool === true);
    }

    /**
     * Set the app language
     *
     * @param $lang
     */
    protected function language($lang)
    {
        $this->define('WPLANG', $lang);
    }

    /**
     * Set the salt keys
     *
     * @param array $config
     */
    protected function salts(array $config)
    {
        $this->define($config);
    }

    /**
     * Set ssl login and admin
     *
     * @param array $config
     */
    protected function ssl(array $config)
    {
        $this->define($config);
    }

    /**
     * Set the default theme
     *
     * @param array $config
     */
    protected function theme(array $config)
    {
        $this->define($config);
    }

    /**
     * Set multi site options
     *
     * @param array $config
     */
    protected function multisite(array $config)
    {
        $this->define($config);
    }

    /**
     * Set custom configs
     *
     * @param array $config
     */
    protected function custom(array $config)
    {
        $this->define($config);
    }

    /**
     * Set cookie options
     *
     * @param array $config
     */
    protected function cookieManagement(array $config)
    {
        $this->define($config);
    }

    /**
     * Set the absolute path to wordpress
     *
     * @param string $path
     */
    protected function appDirectory($path)
    {
        $this->define('ABSPATH', realpath($path));
    }

    /**
     * Set the path to wordpress
     * content directory
     *
     * @param string $path
     */
    protected function contentDirectory($path)
    {
        $path = realpath($path);

        $this->define( 'WP_CONTENT_DIR', $path);
        $this->define( 'WP_CONTENT_URL', Url::to(basename($path)));
    }
}