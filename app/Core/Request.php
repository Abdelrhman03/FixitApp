<?php

namespace App\Core;

// this file will manage the request methods and will return the uri of page and
// will return also the type of method

class Request
{
    // uri will return the uri of website
    public static function uri()
    {
        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $uri = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . $uri;
        $uri = str_replace(home(), "", $uri);
        $uri = trim($uri, "/");
        return $uri;
    }

    // this function will return the value that post of get hold

    public static function get($key, $default = null)
    {
        return $_GET[$key] ?? $_POST[$key] ?? $default;
    }

    // this function will return the type of method

    public static function method()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
}
