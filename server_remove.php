<?php

require 'vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

if (!isset($_GET['server'])) {
	header('location:../select_server.php?error=please set server Id');
} else {
    $servers = [];
    $current_server_id = 0;
    foreach (Yaml::parseFile('config/db.yaml') as $key => $value) {
    	if ($current_server_id != $_GET['server']) {
    		array_push($servers, $value);	
    	}
        $current_server_id ++;
    }
    $current_server_id --;
    if ($_GET['server'] > $current_server_id) {
        header('location:../select_server.php?error=invalid server id');
    } else {
        $yaml = Yaml::dump($servers);
        file_put_contents('config/db.yaml', $yaml);
        header('location:../select_server.php?message=server remove with id : '.$_GET['server']);
    }
}