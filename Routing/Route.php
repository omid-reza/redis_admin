<?php

namespace Route;

class Route
{
    private $request;

    private static function setUp()
    {
        $request = '/';
        if (isset($_SERVER['PATH_INFO']))
            $request = $_SERVER['PATH_INFO'];
        return $request;
    }
    public static function get($url, $path)
    {
        $request=static::setUp();
        if ($request == $url)
            require_once __DIR__.'/../app/'.$path.'.php';
    }
}
