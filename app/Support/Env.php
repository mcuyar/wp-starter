<?php namespace Support;

class Env {

    public static function get($key, $default = null)
    {
        return getenv($key) ?: $default;
    }

}