<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas corregidas
Route::get('/bienvenidos', function () {
    return view('bienvenidos');
});

Route::get('/saludos', function () {
    return view('saludos');
});

Route::get('/estudiantes', function () {
    return view('estudiantes');
});

Route::get('/proveedor', function () {
    return view('proveedor');
});