<?php

use Symfony\Component\Yaml\Yaml;

if ((!isset($_POST['host'])) || (!isset($_POST['port']))) {
    header('location:../server_register?error=host or port not set in request');
} else {
    $pass = null;
    $database = 0;
    $servers = [];
    foreach (Yaml::parseFile('config/db.yaml') as $key => $value) {
        array_push($servers, $value);
    }

    if (isset($_POST['password'])) {
        $pass = $_POST['password'];
    }

    if (isset($_POST['database']) && $_POST['database'] != '') {
        $database = $_POST['database'];
    }

    array_push($servers,
        ['host'   => $_POST['host'],
        'port'    => (int) $_POST['port'],
        'password'=> $_POST['password'],
        'database'=> (int) $database, ]);

    $yaml = Yaml::dump($servers);
    file_put_contents('config/db.yaml', $yaml);
    header('location:../');
}
