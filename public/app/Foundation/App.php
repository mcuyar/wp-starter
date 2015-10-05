<?php namespace Foundation;

class App {

    /**
     * The Application Instance
     *
     * @var \Foundation\App
     */
    private static $instance = null;

    /**
     * The Config Instance
     *
     * @var Config
     */
    protected $config;

    /**
     * Instantiate the Application Instance
     *
     * @param Config $config
     */
    private function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Call this method to get singleton
     *
     * @return \Foundation\App
     */
    public static function instance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static(new Config);
        }

        return static::$instance;
    }

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
     * The config instance
     *
     * @return Config
     */
    public static function config()
    {
        return static::instance()->config;
    }

    /**
     * Hide server errors and debug
     */
    public static function hideErrors()
    {
        $config = static::config();

        ini_set('display_errors', 0);
        $config->define('SAVEQUERIES', false);
        $config->define('WP_DEBUG', false);
        $config->define('WP_DEBUG_DISPLAY', true);
    }

    /**
     * Show server errors and debug errors
     */
    public static function showErrors()
    {
        $config = static::config();

        ini_set('display_errors', 1);
        $config->define('SAVEQUERIES', true);
        $config->define('WP_DEBUG', true);
        $config->define('WP_DEBUG_DISPLAY', true);
    }

    public static function forceSSLAdmin()
    {
        $config = static::config();

        $config->define('FORCE_SSL_ADMIN', true);
        $config->define('FORCE_SSL_LOGIN', true);
    }
}