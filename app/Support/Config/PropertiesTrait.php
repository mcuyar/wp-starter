<?php namespace Support\Config;

trait PropertiesTrait {

    /**
     * Get the keys for the public properties
     *
     * @return array
     */
    public function getPublicPropertyKeys()
    {
        return array_keys(
            call_user_func('get_object_vars', $this)
        );
    }

    /**
     * Set a public property
     *
     * @param $key
     * @param $value
     */
    public function setPublicProperty($key, $value)
    {
        if(property_exists($this, $key)) {
            $this->{$key} = $value;
        }
    }

    /**
     * Get a public property
     *
     * @param $key
     * @param $default
     * @return mixed
     */
    public function getPublicProperty($key, $default)
    {
        return property_exists($this, $key) ? $this->{$key} : $default;
    }

    /**
     * Set multiple public properites
     *
     * @param array $public
     */
    public function setPublicProperties(array $public)
    {
        foreach($public as $key => $value) {
            $this->setPublicProperty($key, $value);
        }
    }

    /**
     * Returns all public property
     * values of the class
     *
     * @return array
     */
    public function getPublicProperties()
    {
        $properties = $this->getPublicPropertyKeys();

        return array_combine(
            $properties,
            array_map(
                function($property) {
                    return $this->{$property};
                },
                $properties
            )
        );
    }

}
