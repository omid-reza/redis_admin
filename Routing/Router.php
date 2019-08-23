<?php

namespace Route;

use Route\Route;

Route::get('/', 'Index');
Route::get('/keys', 'Keys');
Route::get('/show', 'Show');
Route::post('/Edit', 'Edit');
Route::get('/Edit', 'EditForm');
Route::get('/Delete', 'Delete');
Route::post('/Insert', 'Insert');
Route::get('/Insert', 'InsertForm');
Route::get('/Search', 'SearchForm');
Route::post('/Search', 'SearchResualt');
Route::get('/NewServer', 'ServerRegister');
Route::post('/NewServer', 'SaveNewServer');
Route::get('/SelectServer', 'SelectServer');
Route::get('/ServerRemove', 'ServerRemove');