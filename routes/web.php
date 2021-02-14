<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layout/main');
// });

// Pegawai
Route::get('/data-pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/tambah-pegawai', [PegawaiController::class, 'create'])->name('tambahPegawai');
Route::post('/simpan-pegawai', [PegawaiController::class, 'store'])->name('simpanPegawai');
Route::get('/ubah-pegawai/{pegawai}', [PegawaiController::class, 'edit']);
Route::put('/update/{pegawai}', [PegawaiController::class, 'update']);
Route::get('/detail-pegawai/{pegawai}', [PegawaiController::class, 'show']);
Route::delete('/hapus/{pegawai}', [PegawaiController::class, 'destroy']);

// Guru
Route::get('/data-guru',[GuruController::class, 'index'])->name('guru');
Route::get('/detail-guru/{guru}',[GuruController::class, 'detail']);
Route::get('/tambah-guru',[GuruController::class, 'tambah']);
Route::post('/insert-guru',[GuruController::class, 'insert'])->name('insert');
Route::get('/edit-guru/{guru}',[GuruController::class, 'edit']);
Route::put('/update-guru/{guru}',[GuruController::class, 'update']);
Route::delete('/hapus-guru/{guru}',[GuruController::class, 'delete']);
