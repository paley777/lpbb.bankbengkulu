<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;

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
Route::get('/gate', [LandingController::class, 'gate'])->middleware('auth');
Route::post('/gate', [LandingController::class, 'check'])->middleware('auth');
//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
