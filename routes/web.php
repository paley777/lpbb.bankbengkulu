<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;

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
// Route::get('/gate', [LandingController::class, 'gate'])->middleware('auth');
// Route::post('/gate', [LandingController::class, 'check'])->middleware('auth');
//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->middleware('auth');
Route::get('/dashboard/profile/edit', [DashboardController::class, 'edit'])->middleware('auth');
Route::post('/dashboard/profile/edit', [DashboardController::class, 'update'])->middleware('auth');
Route::post('/logout', [DashboardController::class, 'logout'])->middleware('auth');
Route::resource('/dashboard/pegawai', PegawaiController::class)->middleware('auth');
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
