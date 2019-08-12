<?php

namespace Operator;

use config\config;

class HashType implements DataType
{
    public static function insert($server_id, $key, $value, $expire = null)
    {
        $config = new config();
        $client = $config->connect($server_id);
        if (is_string($client))
            return false;

        $client->hmset($key, $value);

        if ( ! is_null($expire))
            $client->expire($key, $expire);

        return true;
    }
}
