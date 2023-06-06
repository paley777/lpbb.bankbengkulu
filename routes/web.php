<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UjiKompetensiController;
use App\Http\Controllers\BankSoalController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\PreTestController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriListController;
use App\Http\Controllers\KemajuanPegawaiController;
use App\Http\Controllers\SertifikatController;

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
Route::post('/logout', [DashboardController::class, 'logout'])->middleware('auth');

// ROUTE TO MANAJEMEN PROFILE
Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->middleware('auth');
Route::get('/dashboard/profile/edit', [DashboardController::class, 'edit'])->middleware('auth');
Route::post('/dashboard/profile/edit', [DashboardController::class, 'update'])->middleware('auth');

Route::get('/dashboard/uji-kompetensi', [UjiKompetensiController::class, 'index'])->middleware('auth');

// ROUTE TO MANAJEMEN PEGAWAI
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

//ROUTE TO MANAJEMEN BANK SOAL
Route::resource('/dashboard/bank-soal', BankSoalController::class)->middleware('auth');
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
Route::post('soal-import', [SoalController::class, 'soalImport'])
    ->name('soal-import')
    ->middleware('auth');

// ROUTE TO MANAJEMEN PRE TEST
Route::resource('/dashboard/pre-test', PreTestController::class)->middleware('auth');
Route::post('multiplepretestsdelete', [PreTestController::class, 'multiplepretestsdelete'])
    ->name('multiplepretestsdelete')
    ->middleware('auth');

// ROUTE TO MANAJEMEN POST TEST
Route::resource('/dashboard/post-test', PostTestController::class)->middleware('auth');
Route::post('multipleposttestsdelete', [PostTestController::class, 'multipleposttestsdelete'])
    ->name('multipleposttestsdelete')
    ->middleware('auth');

// ROUTE TO MANAJEMEN PETUGAS
Route::resource('/dashboard/petugas', PetugasController::class)->middleware('auth');
Route::post('multiplepetugassdelete', [PetugasController::class, 'multiplepetugassdelete'])
    ->name('multiplepetugassdelete')
    ->middleware('auth');
Route::post('petugas-import', [PetugasController::class, 'petugasImport'])
    ->name('petugas-import')
    ->middleware('auth');
Route::post('petugas-edit', [PetugasController::class, 'petugasEdit'])
    ->name('petugas-edit')
    ->middleware('auth');

// ROUTE TO MANAJEMEN KELAS
Route::resource('/dashboard/kelas', KelasController::class)->middleware('auth');
Route::get('/dashboard/materi-list/{kelas}', [MateriListController::class, 'index'])->middleware('auth');

//PRETEST
Route::get('/dashboard/materi-list/{kelas}/create-pretest', [MateriListController::class, 'create_pretest'])->middleware('auth');
Route::get('/dashboard/materi-list/{kelas}/edit-pretest', [MateriListController::class, 'edit_pretest'])->middleware('auth');
Route::put('/dashboard/materi-list/{kelas}/edit-pretest', [MateriListController::class, 'update_pretest'])->middleware('auth');
Route::post('/dashboard/materi-list/{kelas}/create-pretest', [MateriListController::class, 'store_pretest'])->middleware('auth');
Route::delete('/dashboard/materi-list/{kelas}', [MateriListController::class, 'destroy'])->middleware('auth');

//POSTTEST
Route::get('/dashboard/materi-list/{kelas}/create-posttest', [MateriListController::class, 'create_posttest'])->middleware('auth');
Route::post('/dashboard/materi-list/{kelas}/create-posttest', [MateriListController::class, 'store_posttest'])->middleware('auth');
Route::get('/dashboard/materi-list/{kelas}/edit-posttest', [MateriListController::class, 'edit_posttest'])->middleware('auth');
Route::put('/dashboard/materi-list/{kelas}/edit-posttest', [MateriListController::class, 'update_posttest'])->middleware('auth');

//MATERI
Route::get('/dashboard/materi-list/{kelas}/create-materi', [MateriListController::class, 'create_materi'])->middleware('auth');
Route::post('/dashboard/materi-list/{kelas}/create-materi', [MateriListController::class, 'store_materi'])->middleware('auth');
Route::get('/dashboard/materi-list/{kelas}/edit-materi', [MateriListController::class, 'edit_materi'])->middleware('auth');
Route::put('/dashboard/materi-list/{kelas}/edit-materi', [MateriListController::class, 'update_materi'])->middleware('auth');
Route::delete('/dashboard/materi-list/{kelas}/materi', [MateriListController::class, 'destroy_materi'])->middleware('auth');

//SERTIFIKAT MANAJEMEN
Route::get('/dashboard/certificate', [SertifikatController::class, 'index_superadmin'])->middleware('auth');
//REPORTING
Route::get('/dashboard/reports', [DashboardController::class, 'index_reports'])->middleware('auth');
Route::get('/dashboard/reports/pegawai', [DashboardController::class, 'export_pegawai'])->middleware('auth');
Route::get('/dashboard/reports/petugas', [DashboardController::class, 'export_petugas'])->middleware('auth');
Route::get('/dashboard/reports/progress', [DashboardController::class, 'export_progress'])->middleware('auth');

//KELAS - PEGAWAI
// INDEX MANAJEMEN KELAS
Route::get('/kelas', [KelasController::class, 'index_pegawai'])->middleware('auth');
//REGIST AND INDEX ROOM
Route::get('/kelas/{kelas}', [KelasController::class, 'detail'])->middleware('auth');
Route::get('/kelas/{kelas}/regist', [KelasController::class, 'regist'])->middleware('auth');
Route::get('/kelas/{kelas}/room', [KelasController::class, 'room'])->middleware('auth');
//PRETEST
Route::get('/kelas/{kelas}/room/{materi}/pretest', [KelasController::class, 'start_pretest'])->middleware('auth');
Route::get('/kelas/{kelas}/room/{materi}/pretest-remedial', [KelasController::class, 'start_pretest_remed'])->middleware('auth');
Route::post('/kelas/{kelas}/room/{materi}/pretest', [KelasController::class, 'submit_pretest'])->middleware('auth');
Route::post('/kelas/{kelas}/room/{materi}/pretest-remedial', [KelasController::class, 'submit_pretest_remed'])->middleware('auth');
//MATERI TAGGING
Route::get('/kelas/{kelas}/room/{materi}/done-materi', [KelasController::class, 'done_materi'])->middleware('auth');
//POSTTEST
Route::get('/kelas/{kelas}/room/{materi}/posttest', [KelasController::class, 'start_posttest'])->middleware('auth');
Route::get('/kelas/{kelas}/room/{materi}/posttest-remedial', [KelasController::class, 'start_posttest_remed'])->middleware('auth');
Route::post('/kelas/{kelas}/room/{materi}/posttest-remedial', [KelasController::class, 'submit_posttest_remed'])->middleware('auth');
Route::post('/kelas/{kelas}/room/{materi}/posttest', [KelasController::class, 'submit_posttest'])->middleware('auth');

//Kemajuan Pribadi
Route::get('/my-progress', [KemajuanPegawaiController::class, 'index'])->middleware('auth');

//Sertifikat
Route::get('/my-certificate', [SertifikatController::class, 'index'])->middleware('auth');
Route::get('/my-certificate/{certificate}/print', [SertifikatController::class, 'generateCertificate'])->middleware('auth');
