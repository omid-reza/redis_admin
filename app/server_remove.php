<?php

use Symfony\Component\Yaml\Yaml;
use config\config;

if (!isset($_GET['server'])) {
    header('location:../select_server?error=please set server Id');
} else {
    $servers = [];
    $current_server_id = 0;
    foreach (config::read_config_file() as $key => $value) {
        if ($current_server_id != $_GET['server'])
            array_push($servers, $value);
        $current_server_id++;
    }
    $current_server_id--;
    if ($_GET['server'] > $current_server_id) {
        header('location:../?error=invalid server id');
    } else {
        file_put_contents(config::$servers_file_path, Yaml::dump($servers));
        header('location:../?message=server remove with id : '.$_GET['server']);
    }
}
