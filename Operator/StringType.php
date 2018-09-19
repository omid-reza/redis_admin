<?php

namespace Operator;

require 'vendor/autoload.php';
use config\config;
use Operator\DataType;

/**
 * @author omid reza heidari
 */
class StringType implements DataType
{
    public static function insert($server_id, $key, $value, $expire = null)
    {
        $config = new config();
        $client = $config->connect($server_id);
        if (is_string($client)) {
            return false;
        }

        $client->set($key, $value);

        if (is_null($expire) == false) {
            $client->expire($key, $expire);
        }

        return true;
    }
}
