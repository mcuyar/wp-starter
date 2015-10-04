<?php namespace Services;

class Url {

    /**
     * Generate a full url
     * by relative path
     *
     * @param string $path
     * @return string
     */
    public static function to($path = '')
    {
        $path = $path ? '/' . ltrim($path, '/') : '';
        return "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]$path";
    }

}