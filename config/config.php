<?php


require 'vendor/autoload.php';
use Predis\Autoloader;

/**
 * @author Omid Reza
 */
class Config
{
	private $client=Null;
	private $host='localhost';
	private $port=6379; # defualt port for redis is 6379
	
	public function __construct()
	{
        		
		Autoloader::register();
	}
	public function connect()
	{
		if(is_string($this->host) and is_int($this->port)) {
			try{
				$this->client = new Predis\Client([
				    'scheme' => 'tcp',
				    'host'   => $this->host,
				    'port'   => $this->port,
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
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
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
