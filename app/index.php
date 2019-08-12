<?php
use Symfony\Component\Yaml\Yaml;

$path = 'select_server.php';
$servers = Yaml::parseFile('config/db.yaml');
if (sizeof($servers)==0)
	$path = 'server_register.php';

require_once __DIR__.'/'.$path;
