<?php namespace Foundation;

use Services\Url;

class Config {

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
     * Limit the memory for the application
     *
     * @param $limit
     */
    public function setMemoryLimit($limit)
    {
        $this->define('WP_MEMORY_LIMIT', $limit.'M');
    }

    /**
     * Get the memory limit of the application
     *
     * @return string
     */
    public function getMemoryLimit()
    {
        return WP_MEMORY_LIMIT;
    }

    /**
     * Set the applications language
     *
     * @param string $lang
     */
    public function setLanguage($lang = '')
    {
        $this->define( 'WPLANG', $lang);
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