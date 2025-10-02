<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', function () {
    return 'Hola a todos';
});

Route::get('/bienvenidos', function () {
    return view('bienvenidos');
});
