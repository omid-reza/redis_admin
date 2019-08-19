<?php

use Symfony\Component\Yaml\Yaml;
use config\config;

$name=null;
if (!isset($_GET['server']))
    return header('location:../select_server?error=please set server Id');
$servers = [];
$current_server_id = 0;
foreach (config::read_config_file() as $key => $value) {
    if ($current_server_id == $_GET['server']){
        if ( ! is_null($value['name']))
            $name=$value['name'];
    }else{
        array_push($servers, $value);
    }
    $current_server_id++;
}
$current_server_id--;
if ($_GET['server'] > $current_server_id) {
    header('location:../?error=invalid server id');
} else {
    file_put_contents(config::$servers_file_path, Yaml::dump($servers));
    if (is_null($name))
        header('location:../?message=server remove with id : '.$_GET['server']);
    else
        header('location:../?message=server remove with name : '.$name);
}