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
            $params = include(__DIR__ .'/../config/app.php');
            static::$instance = new static(new Config($params));
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

    public static function init()
    {
        $config = static::config();

        foreach($config->params() as $constant => $value) {
            if(!is_null($value)) {
                $config->define($constant, $value);
            }
        }
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

}