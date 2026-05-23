<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/antrean/status/{kode_poli}/{tanggalperiksa}', [AntrianController::class, 'statusAntrian']);
Route::post('/antrean', [AntrianController::class, 'ambilAntrian']);
Route::get('/antrean/sisapeserta/{nomorkartu_jkn}/{kode_poli}/{tanggalperiksa}', [AntrianController::class, 'sisaAntrian']);
Route::put('/antrean/batal', [AntrianController::class, 'batalAntrian']);
