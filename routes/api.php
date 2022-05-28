<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KebijakanController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\ProfesiKeuanganController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\SuratTugasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Kebijakan
Route::get('kebijakan', [KebijakanController::class, 'index']);
Route::post('kebijakan/store', [KebijakanController::class, 'store']);
Route::put('kebijakan/update/{id}', [KebijakanController::class, 'update']);
Route::get('kebijakan/show/{id}', [KebijakanController::class, 'show']);
Route::delete('kebijakan/delete/{id}', [KebijakanController::class, 'destroy']);

// Perizinan
Route::get('perizinan', [PerizinanController::class, 'index']);
Route::post('perizinan/store', [PerizinanController::class, 'store']);
Route::put('perizinan/update/{id}', [PerizinanController::class, 'update']);
Route::get('perizinan/show/{id}', [PerizinanController::class, 'show']);
Route::delete('perizinan/delete/{id}', [PerizinanController::class, 'destroy']);

// Profesi Keuangan
Route::get('profesi-keuangan', [ProfesiKeuanganController::class, 'index']);
Route::post('profesi-keuangan/store', [ProfesiKeuanganController::class, 'store']);
Route::put('profesi-keuangan/update/{id}', [ProfesiKeuanganController::class, 'update']);
Route::get('profesi-keuangan/show/{id}', [ProfesiKeuanganController::class, 'show']);
Route::delete('profesi-keuangan/delete/{id}', [ProfesiKeuanganController::class, 'destroy']);

// Sanksi
Route::get('sanksi', [SanksiController::class, 'index']);
Route::post('sanksi/store', [SanksiController::class, 'store']);
Route::put('sanksi/update/{id}', [SanksiController::class, 'update']);
Route::get('sanksi/show/{id}', [SanksiController::class, 'show']);
Route::delete('sanksi/delete/{id}', [SanksiController::class, 'destroy']);

// Sanksi
Route::get('surat-tugas', [SuratTugasController::class, 'index']);
Route::post('surat-tugas/store', [SuratTugasController::class, 'store']);
Route::put('surat-tugas/update/{id}', [SuratTugasController::class, 'update']);
Route::get('surat-tugas/show/{id}', [SuratTugasController::class, 'show']);
Route::delete('surat-tugas/delete/{id}', [SuratTugasController::class, 'destroy']);