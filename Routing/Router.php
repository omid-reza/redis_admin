<?php

namespace Route;

use Route\Route;

Route::get('/', 'Index');
Route::get('/keys', 'Keys');
Route::get('/show', 'Show');
Route::get('/edit', 'Edit');
Route::get('/delete', 'Delete');
Route::post('/insert', 'Insert');
Route::get('/editForm', 'EditForm');
Route::get('/searchForm', 'SearchForm');
Route::get('/insertForm', 'InsertForm');
Route::get('/select_server', 'SelectServer');
Route::get('/server_remove', 'ServerRemove');
Route::post('/searchResualt', 'SearchResualt');
Route::get('/server_register', 'ServerRegister');
Route::post('/save_new_server', 'SaveNewServer');