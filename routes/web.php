<?php

use App\Http\Controllers\AuthController;
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
});
