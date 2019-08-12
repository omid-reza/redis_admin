<?php

namespace config;

use Predis\Client;
use Predis\Autoloader;
use Symfony\Component\Yaml\Yaml;
use Predis\Connection\ConnectionException;

class config
{

    private $client = null;

    public function __construct()
    {
        Autoloader::register();
    }

    public function connect($server_id)
    {
        if ($this->server_not_exists($server_id))
            return 'server does not exist';
        $options = [
            'parameters' => [
                'password' => $this->getPassword($server_id),
                'database' => $this->getDatabase($server_id),
            ],
        ];
        if (is_string($this->getHost($server_id)) and is_int($this->getPort($server_id))) {
            $params = [
                'scheme' => 'tcp',
                'host'   => $this->getHost($server_id),
                'port'   => $this->getPort($server_id)
            ];
            $this->setClient(new Client($params, $options));
            try {
                $this->getClient()->connect();
                return $this->getClient();
            } catch (ConnectionException $e) {
                return $e->getMessage();
            }
        }
        return 'invalid host and port type !';
    }

    public function getHost($server_id)
    {
        return Yaml::parseFile('config/db.yaml')[$server_id]['host'];
    }

    public function getPort($server_id)
    {
        return Yaml::parseFile('config/db.yaml')[$server_id]['port'];
    }

    public function getPassword($server_id)
    {
        return Yaml::parseFile('config/db.yaml')[$server_id]['password'];
    }

    public function server_not_exists($server_id):bool
    {
        return is_null($this->getHost($server_id)) || is_null($this->getPort($server_id));
    }

    public function getValue($key)
    {
        switch ($this->getClient()->type($key)) {
            case 'string':
                return $this->getClient()->get($key);
            case 'list':
                return $this->getClient()->lrange($key, 0, 4294967295);
            case 'hash':
                return $this->getClient()->HGETALL($key);
            case 'set':
                return $this->getClient()->smembers($key);
            case 'zset':
                return $this->getClient()->ZRANGEBYSCORE($key, 0, 4294967295);
            default:
                return;
        }
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    public function getDatabase($server_id):int
    {
        return Yaml::parseFile('config/db.yaml')[$server_id]['database'];
    }
}
