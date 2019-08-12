<?php

use Symfony\Component\Yaml\Yaml;

if (!isset($_POST['host'])) {
    header('location:../server_register?error=host field not set in request');
} else {
    $port=6379;
    $pass = null;
    $database = 0;
    $servers = [];
    foreach (Yaml::parseFile('config/db.yaml') as $key => $value)
        array_push($servers, $value);

    if(isset($_POST['port']) && $_POST['port'] != '')
        $port= (int) $_POST['port'];

    if (isset($_POST['password']))
        $pass = $_POST['password'];

    if (isset($_POST['database']) && $_POST['database'] != '')
        $database = (int) $_POST['database'];

    array_push($servers,
        ['host'   => $_POST['host'],
        'port'    => $port,
        'password'=> $pass,
        'database'=> $database, ]
    );

    $yaml = Yaml::dump($servers);
    file_put_contents('config/db.yaml', $yaml);
    header('location:../?message=server registered');
}
