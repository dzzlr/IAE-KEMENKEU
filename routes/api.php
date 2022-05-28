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
Route::group(['prefix'=>'kebijakan'], function() {
    Route::get('/', [KebijakanController::class, 'index']);
    Route::post('/store', [KebijakanController::class, 'store']);
    Route::put('/update/{id}', [KebijakanController::class, 'update']);
    Route::get('/show/{id}', [KebijakanController::class, 'show']);
    Route::delete('/delete/{id}', [KebijakanController::class, 'destroy']);
});

// Perizinan
Route::group(['prefix'=>'perizinan'], function() {
    Route::get('/', [PerizinanController::class, 'index']);
    Route::post('/store', [PerizinanController::class, 'store']);
    Route::put('/update/{id}', [PerizinanController::class, 'update']);
    Route::get('/show/{id}', [PerizinanController::class, 'show']);
    Route::delete('/delete/{id}', [PerizinanController::class, 'destroy']);
});

// Profesi Keuangan
Route::group(['prefix'=>'profesi-keuangan'], function() {
    Route::get('/', [ProfesiKeuanganController::class, 'index']);
    Route::post('/store', [ProfesiKeuanganController::class, 'store']);
    Route::put('/update/{id}', [ProfesiKeuanganController::class, 'update']);
    Route::get('/show/{id}', [ProfesiKeuanganController::class, 'show']);
    Route::delete('/delete/{id}', [ProfesiKeuanganController::class, 'destroy']);
});

// Sanksi
Route::group(['prefix'=>'sanksi'], function() {
    Route::get('/', [SanksiController::class, 'index']);
    Route::post('/store', [SanksiController::class, 'store']);
    Route::put('/update/{id}', [SanksiController::class, 'update']);
    Route::get('/show/{id}', [SanksiController::class, 'show']);
    Route::delete('/delete/{id}', [SanksiController::class, 'destroy']);
});

// Surat Tugas
Route::group(['prefix'=>'surat-tugas'], function() {
    Route::get('/', [SuratTugasController::class, 'index']);
    Route::post('/store', [SuratTugasController::class, 'store']);
    Route::put('/update/{id}', [SuratTugasController::class, 'update']);
    Route::get('/show/{id}', [SuratTugasController::class, 'show']);
    Route::delete('/delete/{id}', [SuratTugasController::class, 'destroy']);
});