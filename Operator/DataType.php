<?php 

namespace Operator;

/**
 * @author omid reza heidari
 */
interface DataType
{
	public static function insert($server_id, $key, $value, $expire = null);
}
?>