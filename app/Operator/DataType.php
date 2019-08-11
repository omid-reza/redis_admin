<?php

namespace Operator;


interface DataType
{
    public static function insert($server_id, $key, $value, $expire = null);
}
