<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaFrontendController;



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
    return view('frontend.home');
})->middleware('auth');


// ==================Lading Page==================

Route::get('/home', function () {
    return view('frontend.home');
})->middleware('auth');

Route::get('/about', function () {
    return view('frontend.about');
});

Route::middleware(['peran:admin-staff-mahasiswa'])->group(function () {
    Route::get('/blog', function () {
        return view('frontend.blog');
    });

    Route::get('/blog_view', function () {
        return view('frontend.view_artikel.index');
    });
});

Route::get('/contact', function () {
    return view('frontend.contact');
});

Route::get('/pendaftaran_user', function () {
    return view('frontend.formpendaftaran.pendaftaran');
});

Route::get('/after-register', function () {
    return view('frontend.after_register');
});

Route::get('/blog', [ArtikelController::class, 'index_artikel']);


// ==================Admin Dasboard ==================
// Route::get('/admin', function () {
//     return view('backend.dashboard');
// });
Route::get('/login', [LoginController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/table', function () {
    return view('backend.table');
});
Route::get('/form', function () {
    return view('backend.form');
});
Route::get('/form_mhs', function () {
    return view('backend.mahasiswa.form');
});







// ==================Controller resource ==================
Route::middleware(['peran:admin-staff'])->group(function () {

    Route::resource('/jurusan', JurusanController::class);
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::resource('/form_mahasiswa', MahasiswaFrontendController::class);



    Route::resource('/pendaftaran', PendaftaranController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/organisasi', OrganisasiController::class);
    Route::resource('/user', UserController::class);
    Route::get('/pendaftaran-excel', [PendaftaranController::class, 'pendaftaranExcel'])->name('pendaftaran.excel');
    Route::get('/pendaftaran-pdf', [PendaftaranController::class, 'pendaftaranPDF'])->name('pendaftaran.pdf');
});


Route::resource('/artikel', ArtikelController::class);
// Route::get('/pendaftaran-pdf', [PendaftaranController::class, 'pendaftaranPDF'])->name('pendaftaran.pdf');
Route::get('/after-register', function () {
    return view('frontend.after_register');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/access-denied', function () {
    return view('frontend.access_denied');
})->middleware('auth');
