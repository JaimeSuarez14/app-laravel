<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcomes');
});

Route::get('/test', function() {
    return view('test');
});

Route::get('/eeeee', function() {
    $data = ['name'=>"Jaime", 'age' => 33];
    return view('crud.index', $data);
})->name('crud');

Route::get('/contact', function() {
    //$data = [ "name" => "Jaime"];
    //return view('contact', $data);
    //return redirect("/contact2", 302);
    //return redirect()->route('contact2');
    return to_route('contact2');
})->name('contact');

Route::get('/contact2', function() {
    return view('contact2');
})->name('contact2');
