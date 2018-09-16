<?php

namespace config;

require 'vendor/autoload.php';
use Predis\Autoloader;
use Predis\Client;
use Predis\Connection\ConnectionException;
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
        $pass = $this->getPassword($server_id);
        $options = null;
        if (!is_null($pass)) {
            $options = [
                'parameters' => [
                    'password' => $pass,
                ],
            ];
        }
        if (is_string($this->getHost($server_id)) and is_int($this->getPort($server_id))) {
            $this->setClient(new Client([
                'scheme' => 'tcp',
                'host'   => $this->getHost($server_id),
                'port'   => $this->getPort($server_id),
            ]), $options);

            try {
                $this->getClient()->connect();

                return $this->getClient();
            } catch (ConnectionException $e) {
                return "can't connect to this server !";
            }
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

    public function getPassword($server_id)
    {
        return Yaml::parseFile('config/db.yaml')[$server_id]['password'];
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

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     *
     * @return self
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }
}
