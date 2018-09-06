<?php

if (isset($_POST['type']) and isset($_POST['key']) and isset($_POST['value']) ) {
	$key = null;
	$value = null;
	switch ($_POST['type']) {
		case 'String':
			$key = $_POST['key'];
			$value = $_POST['value'][0];
			require 'op/StringType.php';
			if (isset($_POST['expire'])) {
				$res = (StringType::insert($key, $value, $_POST['expire']));
			}else{
				$res = StringType::insert($key,$value);
			}
			if ($res == true) {
				header('location:../index.php?message=created');
			}else{
				header('location:../index.php?error=nuknow');
			}
			break;
		case 'Hashe':
			$key = $_POST['key'];
			$value = $_POST['value'];
			require 'op/HashType.php';
			if (isset($_POST['expire'])) {
				$res = HashType::insert($key, $value, $_POST['expire']);
			}else{
				$res = HashType::insert($key,$value);
			}
			if ($res == true)
				header('location:../index.php?message=created');
			else
				header('location:../index.php?error=nuknow');
			break;

		case 'List':
			$key = $_POST['key'];
			$value = $_POST['value'];
			require 'op/ListType.php';
			if (isset($_POST['expire'])) {
				$res = ListType::insert($key, $value, $_POST['expire']);
			}else{
				$res = ListType::insert($key,$value);
			}
			if ($res == true)
				header('location:../index.php?message=created');
			else
				header('location:../index.php?error=nuknow');
			break;
	}
}else{
	header('location:../index.php?error=param mis');
}