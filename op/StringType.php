<?php
/**
 * @author omid reza heidari
 */
class StringType
{
	public static function insert($key,$value,$expire=null)
	{
		require 'vendor/autoload.php';
        $config = new Config();
		$client = $config->connect();
		if (is_string($client))
			return false;
		
		$client->set($key,$value);

		if (is_null($expire)==false)
			$client->expire($key,$expire);

		return true;
	}
}