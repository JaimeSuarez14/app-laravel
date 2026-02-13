<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcomes');
});

Route::get('/test', function() {
    return view('test');
});

Route::get('/crud', function() {
    return view('crud.index');
});