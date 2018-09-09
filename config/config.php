<?php


require 'vendor/autoload.php';
use Predis\Autoloader;
use Symfony\Component\Yaml\Yaml;


/**
 * @author Omid Reza
 */
class Config
{
	private $client=Null;
	
	public function __construct()
	{
        		
		Autoloader::register();
	}
	public function connect()
	{
		if(is_string($this->getHost()) and is_int($this->getPort())) {
			try{
				$this->client = new Predis\Client([
				    'scheme' => 'tcp',
				    'host'   => $this->getHost(),
				    'port'   => $this->getPort(),
				]);
				return $this->client;
			}catch (Exception $e){
				return 'server is unavailble';
			}
		}
		return 'host or port not set';
	}


    /**
     * @return mixed
     */
    public function getHost()
    {
        return Yaml::parseFile('config/db.yaml')[0]['host'];;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return Yaml::parseFile('config/db.yaml')[0]['port'];
    }

    public function getValue($key){
    	switch ($this->client->type($key)) {
    		case 'string':
    			return $this->client->get($key);
    		case 'list':
    			return $this->client->lrange($key, 0, 4294967295);
    		case 'hash':
    			return $this->client->HGETALL($key);
    		case 'set':
    			return $this->client->smembers($key);
    		case 'zset':
    			return $this->client->ZRANGEBYSCORE ($key, 0, 4294967295);
    		default:
    			return null;
    	}
    }
}
