<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ==================Lading Page==================



// ==================Admin Dasboard ==================
Route::get('/admin', function () {
    return view('backend.dashboard');
});
Route::get('/table', function () {
    return view('backend.table');
});
Route::get('/form', function () {
    return view('backend.form');
});
