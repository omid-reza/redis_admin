<?php

namespace Operator;

use config\config;

class ListType implements DataType
{
    public static function insert($server_id, $key, $values, $expire = null)
    {
        $config = new config();
        $client = $config->connect($server_id);

        if (is_string($client))
            return false;

        foreach ($values as $valKey => $value)
            $client->lpush($key, $value);

        if ( ! is_null($expire))
            $client->expire($key, $expire);

        return true;
    }
}
