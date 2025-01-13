<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'Test route is working!';
});

Route::get('/', function () {
    return view('welcome');
});
