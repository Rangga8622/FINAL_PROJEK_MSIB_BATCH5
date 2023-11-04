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

Route::get('home', function () {
    return view('frontend.home');
});

Route::get('service', function () {
    return view('frontend.service');
});

Route::get('about', function () {
    return view('frontend.about');
});

Route::get('blog', function () {
    return view('frontend.blog');
});

Route::get('contact', function () {
    return view('frontend.contact');
});

Route::get('pendaftaran', function () {
    return view('frontend.pendaftaran');
});





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
