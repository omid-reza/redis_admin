<?php
namespace language;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class language{
	static function get_string($key){
		try{
			$translated=self::read_lang_file()[$key];
			return (is_null($translated))?$key:$translated;
		}catch(ParseException $e){
			return $key;
		}
	}

	static function get_language(){
		try{
			return Yaml::parseFile('config/setting.yml')['language'];	
		}catch(ParseException $e){
			return 'english';
		}
	}

	static function read_lang_file()
	{
		return Yaml::parseFile('langs/'.self::get_language().'.yml');
	}
}