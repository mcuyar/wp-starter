<?php namespace Support;

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
        $scheme = static::isSecure() ? 'https' : 'http';
        return $scheme."://$_SERVER[HTTP_HOST]$path";
    }

    /**
     * Check if current request is via SSL
     *
     * @return bool
     */
    public static function isSecure()
    {
        $proto = (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO']  == 'https');
        $ssl = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on');

        return ($proto || $ssl);
    }
}