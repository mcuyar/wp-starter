<?php namespace Support\Config;

abstract class AbstractFactory {

    use PropertiesTrait;

    /**
     * Private constructor for instantiating the class
     *
     * @param array $options
     */
    private function __construct(array $options = [])
    {
        $this->fill($options);
    }

    /**
     * Factory method for setting options
     * and invoking the class
     *
     * @param array $options
     * @return static
     */
    public static function set(array $options = [])
    {
        $instance = new static($options);

        $instance->__invoke();

        return $instance;
    }

    /**
     * Fill the public properties
     *
     * @param array $properties
     */
    public function fill(array $properties)
    {
        foreach($properties as $arg => $value) {
            $this->setPublicProperty($arg, $value);
        }
    }

    /**
     * Define a new global php constant
     *
     * @param $key
     * @param null $value
     */
    public function define($key, $value = null)
    {
        if(is_array($key)) {
            foreach($key as $item => $value) {
                $this->define($item, $value);
            }
            return;
        }

        if(!defined($key) && !is_null($value)) {
            define($key, $value);
        }
    }

    /**
     * Invoke the class
     */
    public function __invoke()
    {
        foreach($this->getPublicProperties() as $property => $value) {

            if(!is_null($value)) {
                $method = $this->getMethodName($property);
                $this->{$method}($value);
            }
        }
    }

    /**
     * Load a config file and run the factory
     *
     * @param $file
     * @return AbstractFactory|static
     * @throws \Exception
     */
    public static function load($file)
    {
        if(!file_exists($file)) {
            return new static;
        }

        $options = include($file);

        if(!is_array($options)) {
            throw new \Exception('file must return an array');
        }

        return static::set($options);
    }

    /**
     * Create a camel cased method name
     * from a property name
     *
     * @param $property
     * @return string
     */
    private function getMethodName($property)
    {
        $parts = explode('_', $property);
        $first = strtolower(array_shift($parts));

        $name = array_map(function($n) { return ucfirst(strtolower($n)); }, $parts);
        array_unshift($name, $first);

        return implode('', $name);
    }
}