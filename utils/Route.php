<?php

require "Endpoint.php";

class Route
{
    private static $routes = [];
    private static $lastroute = "";
    private static $filedir = "";
    private static $error_dir = "";
    private static function _setGeneric($path, $method)
    {
        $endpoint = new Endpoint();
        $endpoint->method = $method;
        $endpoint->path = $path;
        self::$routes[$endpoint->id()] = "";
        self::$lastroute = $endpoint->id();
        return new static();
    }
    public static function setRenderDirectory($dir)
    {
        self::$filedir = $dir;
    }
    public static function GET($path)
    {
        return self::_setGeneric($path, "GET");
    }
    public static function POST($path)
    {
        return self::_setGeneric($path, "POST");
    }
    public static function setErrorDirectory($dir)
    {
        self::$error_dir = $dir;
    }
    public static function render($php_file)
    {
        if (self::$lastroute === "") {
            return;
        }
        self::$routes[self::$lastroute] = $php_file;
    }
    /**
     * Accepts a SERVER_URI variable
    */
    public static function routeURL($url)
    {
        $endpoint = new Endpoint();
        $endpoint->path = $url["path"];
        $endpoint->method = $_SERVER['REQUEST_METHOD'];
        if (array_key_exists($endpoint->id(), self::$routes)) {
            require self::$filedir.self::$routes[$endpoint->id()];
        } else {
            http_response_code(404);
            require self::$error_dir."404.php";
            die();
        }
    }
};
