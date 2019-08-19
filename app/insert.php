<?php

use Operator\SetType;
use Operator\HashType;
use Operator\ListType;
use language\language;
use Operator\StringType;
use Operator\SortedListType;

if (!isset($_POST['server'])) {
    echo language::get_string('Please set server_id in header !');;
} elseif (isset($_POST['type']) and isset($_POST['key']) and isset($_POST['value'])) {
    $value = null;
    $key = $_POST['key'];
    switch ($_POST['type']) {
        case 'String':
            $value = $_POST['value'][0];
            if (isset($_POST['expire']))
                $res = StringType::insert($_POST['server'], $key, $value, $_POST['expire']);
            else
                $res = StringType::insert($_POST['server'], $key, $value);
            if ($res)
                header('location:../keys?message='.language::get_string('Created').'&server='.$_POST['server']);
            else
                header('location:../keys?error=nuknow&server='.$_POST['server']);
            break;
        case 'Hashe':
            $value = $_POST['value'];
            if (isset($_POST['expire']))
                $res = HashType::insert($_POST['server'], $key, $value, $_POST['expire']);
            else
                $res = HashType::insert($_POST['server'], $key, $value);
            if ($res)
                header('location:../keys?message='.language::get_string('Created').'&server='.$_POST['server']);
            else
                header('location:../keys?error=nuknow&server='.$_POST['server']);
            break;
        case 'List':
            $value = $_POST['value'];
            if (isset($_POST['expire']))
                $res = ListType::insert($_POST['server'], $key, $value, $_POST['expire']);
            else
                $res = ListType::insert($_POST['server'], $key, $value);
            if ($res)
                header('location:../keys?message='.language::get_string('Created').'&server='.$_POST['server']);
            else
                header('location:../keys?error=nuknow&server='.$_POST['server']);
            break;
        case 'Set':
            $value = $_POST['value'];
            if (isset($_POST['expire']))
                $res = SetType::insert($_POST['server'], $key, $value, $_POST['expire']);
            else
                $res = SetType::insert($_POST['server'], $key, $value);
            if ($res)
                header('location:../keys?message='.language::get_string('Created').'&server='.$_POST['server']);
            else
                header('location:../keys?error=nuknow&server='.$_POST['server']);
            break;
        case 'Sorted List':
            $value = $_POST['value'];
            if (isset($_POST['expire']))
                $res = SortedListType::insert($_POST['server'], $key, $value, $_POST['expire']);
            else
                $res = SortedListType::insert($_POST['server'], $key, $value);
            if ($res)
                header('location:../keys?message='.language::get_string('Created').'&server='.$_POST['server']);
            else
                header('location:../keys?error=nuknow&server='.$_POST['server']);
            break;
    }
} else {
    header('location:../index?error=prameter mising');
}
