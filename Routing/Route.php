<?php

class Route
{
    private $request;

    public function __construct()
    {
        $request = '/';
        if (isset($_SERVER['PATH_INFO'])) {
            $request = $_SERVER['PATH_INFO'];
        }
        $this->request = $request;
    }

    public function get($url, $path)
    {
        if ($this->request == $url) {
            require_once __DIR__.'/../'.$path.'.php';
        }
    }
}
