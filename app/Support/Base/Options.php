<?php namespace Support\Base;

use Support\Instance\PropertiesTrait;

class Options {

    use PropertiesTrait;

    public function __construct(array $options = [])
    {
        wp_parse_args($options, $this->publicProperties());
    }


}