<?php

use Operator\SetType;
use Operator\ListType;
use Operator\HashType;
use Operator\StringType;
use Operator\SortedListType;

if (!isset($_POST['server'])) {
    echo 'Please set server_id in header !';
} elseif (isset($_POST['type']) and isset($_POST['key']) and isset($_POST['value'])) {
    $key = null;
    $value = null;
    switch ($_POST['type']) {
        case 'String':
            $key = $_POST['key'];
            $value = $_POST['value'][0];
            if (isset($_POST['expire']))
                $res = StringType::insert($_POST['server'], $key, $value, $_POST['expire']);
            else
                $res = StringType::insert($_POST['server'], $key, $value);
            if ($res == true)
                header('location:../keys?message=created&server='.$_POST['server']);
            else
                header('location:../keys?error=nuknow&server='.$_POST['server']);
            break;
        case 'Hashe':
            $key = $_POST['key'];
            $value = $_POST['value'];
            if (isset($_POST['expire']))
                $res = HashType::insert($_POST['server'], $key, $value, $_POST['expire']);
            else
                $res = HashType::insert($_POST['server'], $key, $value);
            if ($res == true)
                header('location:../keys?message=created&server='.$_POST['server']);
            else
                header('location:../keys?error=nuknow&server='.$_POST['server']);
            break;
        case 'List':
            $key = $_POST['key'];
            $value = $_POST['value'];
            if (isset($_POST['expire']))
                $res = ListType::insert($_POST['server'], $key, $value, $_POST['expire']);
            else
                $res = ListType::insert($_POST['server'], $key, $value);
            if ($res == true)
                header('location:../keys?message=created&server='.$_POST['server']);
            else
                header('location:../keys?error=nuknow&server='.$_POST['server']);
            break;
        case 'Set':
            $key = $_POST['key'];
            $value = $_POST['value'];
            if (isset($_POST['expire']))
                $res = SetType::insert($_POST['server'], $key, $value, $_POST['expire']);
            else
                $res = SetType::insert($_POST['server'], $key, $value);
            if ($res == true)
                header('location:../keys?message=created&server='.$_POST['server']);
            else
                header('location:../keys?error=nuknow&server='.$_POST['server']);
            break;
        case 'Sorted List':
            $key = $_POST['key'];
            $value = $_POST['value'];
            if (isset($_POST['expire']))
                $res = SortedListType::insert($_POST['server'], $key, $value, $_POST['expire']);
            else
                $res = SortedListType::insert($_POST['server'], $key, $value);
            if ($res == true)
                header('location:../keys?message=created&server='.$_POST['server']);
            else
                header('location:../keys?error=nuknow&server='.$_POST['server']);
            break;
    }
} else {
    header('location:../index?error=paramiter mising');
}
