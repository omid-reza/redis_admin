<?php
namespace config;

class lang
{
	private static $lang='english';
	public static function get_language(){
		return strtolower(self::$lang);
	}
}