<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bienvenidos', function () {
    return view('bienvenidos');
});

// Nuevas rutas
Route::get('/productos', function () {
    return view('productos');
});

Route::get('/ventas', function () {
    return view('ventas');
});

Route::get('/cliente', function () {
    return view('cliente');
});

Route::get('/proveedor', function () {
    return view('proveedor');
});