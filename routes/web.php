<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\MateriRapatController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\UnitKerjaController;
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
    return view('landing');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']); 

    Route::get('/unit-kerja', [UnitKerjaController::class, 'index']);
    Route::post('/unit-kerja/store', [UnitKerjaController::class, 'store']);
    Route::get('/unit-kerja/edit', [UnitKerjaController::class, 'edit']);
    Route::post('/unit-kerja/update', [UnitKerjaController::class, 'update']);
    Route::post('/unit-kerja/delete', [UnitKerjaController::class, 'delete']);

    Route::get('/jabatan', [JabatanController::class, 'index']);
    Route::post('/jabatan/store', [JabatanController::class, 'store']);
    Route::get('/jabatan/edit', [JabatanController::class, 'edit']);
    Route::post('/jabatan/update', [JabatanController::class, 'update']);
    Route::post('/jabatan/delete', [JabatanController::class, 'delete']);

    Route::get('/bank', [BankController::class, 'index']);
    Route::post('/bank/store', [BankController::class, 'store']);
    Route::get('/bank/edit', [BankController::class, 'edit']);
    Route::post('/bank/update', [BankController::class, 'update']);
    Route::post('/bank/delete', [BankController::class, 'delete']);

    Route::get('/bank', [BankController::class, 'index']);
    Route::post('/bank/store', [BankController::class, 'store']);
    Route::get('/bank/edit', [BankController::class, 'edit']);
    Route::post('/bank/update', [BankController::class, 'update']);
    Route::post('/bank/delete', [BankController::class, 'delete']);

    Route::get('/daftar-peserta', [PesertaController::class, 'index']);
    Route::post('/daftar-peserta/store', [PesertaController::class, 'store']);
    Route::get('/daftar-peserta/edit', [PesertaController::class, 'edit']);
    Route::post('/daftar-peserta/update', [PesertaController::class, 'update']);
    Route::post('/daftar-peserta/delete', [PesertaController::class, 'delete']);

    Route::get('/materi-raker', [MateriRapatController::class, 'index']);
    Route::post('/materi-raker/store', [MateriRapatController::class, 'store']);
    Route::get('/materi-raker/edit', [MateriRapatController::class, 'edit']);
    Route::post('/materi-raker/update', [MateriRapatController::class, 'update']);
    Route::post('/materi-raker/delete', [MateriRapatController::class, 'delete']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginCheck']);
});


Route::get('/pendaftaran', [RegistrasiController::class, 'registrasi']);
Route::post('/pendaftaran', [RegistrasiController::class, 'registrasiProccess']);

Route::fallback(function () {
    return redirect('/pendaftaran');
});