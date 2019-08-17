<?php
use Symfony\Component\Yaml\Yaml;
use config\config;
$path = 'select_server.php';
$servers = config::read_config_file();
if (sizeof($servers)==0)
	$path = 'server_register.php';

require_once __DIR__.'/'.$path;
