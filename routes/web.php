<?php

use Illuminate\Support\Facades\Route;

// 1. Portada (Index)
Route::get('/', function () {
    return view('welcome'); // welcome.blade.php
});

// 2. Autenticación
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

// 3. Menú Cliente
Route::get('/menu', function () {
    return view('menu');
})->name('menu');

// 4. Paneles Administrativos
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/staff', function () {
    return view('staff');
})->name('staff');

// 5. Pantalla KDS
Route::get('/kds', function () {
    return view('kds');
})->name('kds');

Route::get('/test-menu', [\App\Http\Controllers\Api\MenuController::class, 'index']);