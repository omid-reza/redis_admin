<?php
use config\config;
$servers = config::read_config_file();
$path = (sizeof($servers)==0)?'ServerRegister':'SelectServer';
require_once __DIR__.'/'.$path.'.php';