<?php
namespace language;

use config\lang;
use Symfony\Component\Yaml\Yaml;

class language{
	public static function get_string($key){
		if (lang::get_language()=='english')
			return $key;
		return self::read_lang_file()[$key];
	}

	public static function read_lang_file()
	{
		return Yaml::parseFile('langs/'.lang::get_language().'.yml');
	}
}