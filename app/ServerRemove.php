<?php

use config\config;
use language\language;
use Symfony\Component\Yaml\Yaml;

$name=null;
if (!isset($_GET['server']))
    return header('location:../SelectServer?error='.language::get_string('Please set server_id in header !'));
$current_server_id = 0;
$pervious_servers=config::read_config_file();
if (array_key_exists($_GET['server'], $pervious_servers)) {
    if ( ! is_null($pervious_servers[$_GET['server']]['name']))
        $name=$pervious_servers[$_GET['server']]['name'];
    unset($pervious_servers[$_GET['server']]);
    file_put_contents(config::$servers_file_path, Yaml::dump($pervious_servers));
    if (is_null($name))
        header('location:../?message='.language::get_string('server remove with id').' : '.$_GET['server']);
    else
        header('location:../?message='.language::get_string('server remove with name').' : '.$name);    
}else{
    header('location:../?error='.language::get_string('invalid server id'));
}