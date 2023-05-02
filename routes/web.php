<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UjiKompetensiController;
use App\Http\Controllers\BankSoalController;
use App\Http\Controllers\SoalController;

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

//Landing
Route::get('/', [LandingController::class, 'index']);
Route::get('/tentang', [LandingController::class, 'about']);
//login
Route::get('/login', [LandingController::class, 'login']);
Route::post('/login', [LandingController::class, 'authenticate'])->name('login');
//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->middleware('auth');
Route::get('/dashboard/uji-kompetensi', [UjiKompetensiController::class, 'index'])->middleware('auth');
Route::get('/dashboard/profile/edit', [DashboardController::class, 'edit'])->middleware('auth');
Route::post('/dashboard/profile/edit', [DashboardController::class, 'update'])->middleware('auth');
Route::post('/logout', [DashboardController::class, 'logout'])->middleware('auth');
Route::resource('/dashboard/pegawai', PegawaiController::class)->middleware('auth');
Route::resource('/dashboard/bank-soal', BankSoalController::class)->middleware('auth');
Route::get('/dashboard/pegawai/{user}/suspend', [PegawaiController::class, 'suspend'])->middleware('auth');
Route::get('/dashboard/pegawai/{user}/activate', [PegawaiController::class, 'activate'])->middleware('auth');
Route::post('file-import', [PegawaiController::class, 'fileImport'])
    ->name('file-import')
    ->middleware('auth');
Route::post('file-edit', [PegawaiController::class, 'fileEdit'])
    ->name('file-edit')
    ->middleware('auth');
Route::post('multipleusersdelete', [PegawaiController::class, 'multipleusersdelete'])
    ->name('multipleusersdelete')
    ->middleware('auth');
Route::post('multiplebanksdelete', [BankSoalController::class, 'multiplebanksdelete'])
    ->name('multiplebanksdelete')
    ->middleware('auth');

//ROUTE TO MANAJEMEN SOAL
Route::get('/dashboard/soal/{soal}', [SoalController::class, 'index'])->middleware('auth');
Route::get('/dashboard/soal/{soal}/create', [SoalController::class, 'create'])->middleware('auth');
Route::get('/dashboard/soal/{soal}/edit', [SoalController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/soal/{soal}', [SoalController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/soal/{soal}', [SoalController::class, 'destroy'])->middleware('auth');
Route::post('/dashboard/soal', [SoalController::class, 'store'])->middleware('auth');
Route::post('/dashboard/soal/cari', [SoalController::class, 'cari'])->middleware('auth');
Route::post('multiplesoalsdelete', [SoalController::class, 'multiplesoalsdelete'])
    ->name('multiplesoalsdelete')
    ->middleware('auth');
