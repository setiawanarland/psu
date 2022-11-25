<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LingkunganController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'index'])->name('page');

Route::get('/login', [AuthController::class, 'index'])->name('page-login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/set-login', [AuthController::class, 'setLogin'])->name('set-login');
Route::get('/logout', [AuthController::class, 'logout'])->name('set-logout');

Route::get('set-tahun', [Controller::class, 'setTahun'])->name('set-tahun');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    Route::prefix('lingkungan')->group(function () {
        Route::get('/', [LingkunganController::class, 'index'])->name('lingkungan');
        Route::get('/list', [LingkunganController::class, 'list'])->name('lingkungan-list');
        Route::post('/lingkungan-store', [LingkunganController::class, 'store'])->name('lingkungan-store');
        Route::get('/show/{id}', [LingkunganController::class, 'show'])->name('get-lingkungan');
        Route::post('/lingkungan-update', [LingkunganController::class, 'update'])->name('lingkungan-update');
        Route::delete('/delete/{id}', [LingkunganController::class, 'delete'])->name('lingkungan-delete');
    });

    Route::prefix('lokasi')->group(function () {
        Route::get('/', [LokasiController::class, 'index'])->name('lokasi');
        Route::get('/list', [LokasiController::class, 'list'])->name('lokasi-list');
        Route::post('/lokasi-store', [LokasiController::class, 'store'])->name('lokasi-store');
        Route::get('/show/{id}', [LokasiController::class, 'show'])->name('get-lokasi');
        Route::post('/lokasi-update', [LokasiController::class, 'update'])->name('lokasi-update');
        Route::delete('/delete/{id}', [LokasiController::class, 'delete'])->name('lokasi-delete');
    });
});
