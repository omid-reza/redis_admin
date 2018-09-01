<?php

/**
 * @author omid reza heidari
 */
class ListType
{
	
	public static function insert($key, $value, $expire=null){
		require 'config.php';
		$config=new Config();
		$client = $config->connect();
		
		if (is_string($client))
			return false;

		foreach ($value as $valKey => $val){
			$client->lpush($key, $val);
		}

		if (is_null($expire)==false){
			$client->expire($key,$expire);
		}

		return true;
	}
}