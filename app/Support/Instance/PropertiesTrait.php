<?php namespace Support\Instance;

trait PropertiesTrait {

    /**
     * Get the keys for the public properties
     *
     * @return array
     */
    public function publicPropertyKeys()
    {
        return array_keys(
            call_user_func('get_object_vars', $this)
        );
    }

    /**
     * Returns all public property
     * values of the class
     *
     * @return array
     */
    public function publicProperties()
    {
        $properties = $this->publicPropertyKeys();

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
