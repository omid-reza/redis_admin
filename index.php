<?php

    require 'vendor/autoload.php';
    use Symfony\Component\Yaml\Yaml;

    if (is_null(Yaml::parseFile('config/db.yaml'))) {
        header('location:server_register.php');
    } else {
        header('location:select_server.php');
    }
