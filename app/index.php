<?php
use config\config;
use Symfony\Component\Yaml\Yaml;
$path = 'select_server.php';
$servers = config::read_config_file();
if (sizeof($servers)==0)
	$path = 'server_register.php';
require_once __DIR__.'/'.$path;
