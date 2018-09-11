<?php

namespace config;

require 'vendor/autoload.php';
use Predis\Autoloader;
use Predis\Client;
use Symfony\Component\Yaml\Yaml;

/**
 * @author Omid Reza
 */
class config
{
    private $client = null;

    public function __construct()
    {
        Autoloader::register();
    }

    public function connect($server_id)
    {
        if (is_string($this->getHost($server_id)) and is_int($this->getPort($server_id))) {
            return $this->client = new Client([
                'scheme' => 'tcp',
                'host'   => $this->getHost($server_id),
                'port'   => $this->getPort($server_id),
            ]);
		 }

        return 'host or port not set';
	 }

    /**
     * @return mixed
     */
    public function getHost($server_id):string
    {
        return Yaml::parseFile('config/db.yaml')[$server_id]['host'];
    }

    /**
     * @return mixed
     */
    public function getPort($server_id):int
    {
        return Yaml::parseFile('config/db.yaml')[$server_id]['port'];
    }

    public function getValue($key)
    {
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
                return $this->client->ZRANGEBYSCORE($key, 0, 4294967295);
            default:
                return;
        }
    }
}
