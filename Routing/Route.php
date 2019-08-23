<?php

namespace Route;

class Route
{
    static $request;

    private static function setUp()
    {
        return (isset($_SERVER['PATH_INFO']))?strtolower($_SERVER['PATH_INFO']):'/';
    }
    public static function get($url, $path)
    {
        $request=static::setUp();
        if ($request == strtolower($url) && static::method_name()=='get')
            require_once __DIR__.'/../app/'.$path.'.php';
    }

    public static function post($url, $path){
        $request=static::setUp();
        if ($request == strtolower($url) && static::method_name()=='post')
            require_once __DIR__.'/../app/'.$path.'.php';
    }

    public static function method_name(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
