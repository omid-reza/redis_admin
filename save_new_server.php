<?php

require 'vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

if ((!isset($_POST['host'])) || (!isset($_POST['port']))) {
    header('location:../server_register.php?error=host or port not set in request');
} else {
    $servers = [];
    foreach (Yaml::parseFile('config/db.yaml') as $key => $value) {
        array_push($servers, $value);
    }
    array_push($servers, ['host' =>  $_POST['host'], 'port' => $_POST['port']]);
    $yaml = Yaml::dump($servers);
    file_put_contents('config/db.yaml', $yaml);
    header('location:../');
}
