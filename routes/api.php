<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\JurusanController;
use App\Http\Controllers\Api\OrganisasiController;
use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\PendaftaranController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//-------route Rest API KATEGORI------
Route::get('/kategoriall', [KategoriController::class, 'index']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
Route::post('/kategori-create', [KategoriController::class, 'store']);

//-------route Rest API JURUSAN------
Route::get('/jurusanall', [JurusanController::class, 'index']);
Route::get('/jurusan/{id}', [JurusanController::class, 'show']);
Route::post('/jurusan-create', [JurusanController::class, 'store']);

//-------route Rest API ORGANISASI------
Route::get('/organisasiall', [OrganisasiController::class, 'index']);
Route::get('/organisasi/{id}', [OrganisasiController::class, 'show']);
Route::post('/organisasi-create', [OrganisasiController::class, 'store']);
Route::put('/organisasi/{id}', [OrganisasiController::class, 'update']);
Route::delete('/organisasi/{id}', [OrganisasiController::class, 'destroy']);

//------------------route Rest API Mahasiswa----------//
Route::get('/mahasiswaall', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);
Route::post('/mahasiswa-create', [MahasiswaController::class, 'store']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);

//------------------route Rest API Mahasiswa----------//
Route::get('/pemdaftaranall', [PendaftaranController::class, 'index']);
Route::get('/pendaftaran/{id}', [PendaftaranController::class, 'show']);
Route::post('/pendaftaran-create', [PendaftaranController::class, 'store']);
Route::put('/Pendaftaran/{id}', [PendaftaranController::class, 'update']);
Route::delete('/Pendaftaran/{id}', [PendaftaranController::class, 'destroy']);