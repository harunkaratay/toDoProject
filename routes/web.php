<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//test routing
Route::get('/testTamplate', function () {
    return view('panel.layout.app');
});
