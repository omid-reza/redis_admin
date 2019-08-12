<?php

namespace Operator;

use config\config;

class ListType implements DataType
{
    public static function insert($server_id, $key, $value, $expire = null)
    {
        $config = new config();
        $client = $config->connect($server_id);

        if (is_string($client))
            return false;

        foreach ($value as $valKey => $val)
            $client->lpush($key, $val);

        if ( ! is_null($expire))
            $client->expire($key, $expire);

        return true;
    }
}
