<?php

use Symfony\Component\Yaml\Yaml;
use config\config;
use language\language;

if ( ! isset($_POST['host'])) {
    header('location:../server_register?error=host field not set in request');
} else {
    $name=null;
    $port=6379;
    $pass = null;
    $database = 0;
    $host = $_POST['host'];
    $servers = config::read_config_file();

    if(isset($_POST['port']) && $_POST['port'] != '')
        $port= (int) $_POST['port'];

    if (isset($_POST['password']))
        $pass = $_POST['password'];

    if (isset($_POST['name']) && $_POST['name'] != '')
        $name = $_POST['name'];

    if (isset($_POST['database']) && $_POST['database'] != '')
        $database = (int) $_POST['database'];
    array_push($servers, 
        [
            'name'=> $name,
            'host' => $host,
            'port' => $port,
            'password'=> $pass,
            'database'=> $database
        ]
    );
    file_put_contents(config::$servers_file_path, Yaml::dump($servers));
    header('location:../?message='.language::get_string('server registered'));
}
