<?php

namespace Operator;
require 'vendor/autoload.php';
use config\Config;

/**
 * @author omid reza heidari
 */

class SetType
{
	public static function insert($server_id, $key, $value, $expire=null):bool
	{
        $config = new Config();
		$client = $config->connect($server_id);
		
		if (is_string($client))
			return false;

		foreach ($value as $valKey => $val){
			$client->sadd($key, $val);
		}

		if (is_null($expire)==false)
			$client->expire($key,$expire);

		return true;
	}
}