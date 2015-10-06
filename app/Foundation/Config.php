<?php namespace Foundation;

use Services\Url;

class Config {

    protected $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * Set the applications core directory
     *
     * @param $path
     */
    public function setAppDirectory($path)
    {
        $this->define('ABSPATH', realpath($path));
    }

    /**
     * Get the application core directory
     *
     * @return string
     */
    public function getAppDirectory()
    {
        return ABSPATH;
    }

    /**
     * Set the content directory for the application
     *
     * @param string $path
     */
    public function setContentDirectory($path = '')
    {
        $path = realpath($path);

        $this->define( 'WP_CONTENT_DIR', $path);
        $this->define( 'WP_CONTENT_URL', Url::to(basename($path)));
    }

    /**
     * Load and require a file starting
     * from the base application directory
     *
     * @param $file
     */
    public function load($file)
    {
        $path = $file ? '/' . ltrim($file, '/') : '';
        require_once($this->getAppDirectory() . $path);

    }

    public function params()
    {
        return $this->params;
    }

    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->params) ? $this->params[$key] : $default;
    }

    /**
     * Define a global constant for the application
     *
     * @param $name
     * @param string $value
     */
    public function define($name, $value = '')
    {
        if(!defined($name)) {
            define($name, $value);
        }
    }

}