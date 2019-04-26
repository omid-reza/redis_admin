<?php

require 'Route.php';
$route = new Route();

$route->get('/', 'app/index');
$route->get('/keys', 'app/keys');
$route->get('/select_server', 'app/select_server');
$route->get('/server_remove', 'app/server_remove');
$route->get('/server_register', 'app/server_register');
$route->get('/save_new_server', 'app/save_new_server');
$route->get('/show', 'app/show');
$route->get('/delete', 'app/delete');
$route->get('/searchForm', 'app/searchForm');
$route->get('/searchResualt', 'app/searchResualt');
$route->get('/insertForm', 'app/insertForm');
$route->get('/insert', 'app/insert');
$route->get('/editForm', 'app/editForm');
$route->get('/edit', 'app/edit');
