<?php
    use Symfony\Component\Yaml\Yaml;

$path = 'select_server.php';
    $servers = Yaml::parseFile('config/db.yaml');
    if (is_null($servers)) {
        $path = 'server_register.php';
    }

    require_once __DIR__.'/'.$path;
