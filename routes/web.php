<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pengeluaranController;
use App\Http\Controllers\pendapatanController;
use App\Http\Controllers\pendapatan_adminController;

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
    return view('dashboard');
});

// Route::get('/pengeluaran', [pengeluaranController::class, 'index'])->name('pengeluaran');

Route::resource('/pengeluaran', pengeluaranController::class);
Route::resource('/pendapatan', pendapatanController::class);
Route::resource('/pendapatan_admin', pendapatan_adminController::class);
