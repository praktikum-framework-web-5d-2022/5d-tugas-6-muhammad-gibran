<?php

use App\Http\Controllers\TiketController;
use App\Http\Controllers\PenumpangController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('tiket')->group(function () {
    Route::get('/', [TiketController::class, 'index'])->name('tikets.index');
    Route::get('/create/{tiket}', [TiketController::class, 'create'])->name('tikets.create');
    Route::post('/create/{tiket}', [TiketController::class, 'store'])->name('tikets.store');
    Route::get('/move', [TiketController::class, 'move'])->name('tikets.move');
    Route::put('/move', [TiketController::class, 'moveUpdate'])->name('tikets.moveUpdate');
    Route::delete('/{tiket}', [TiketController::class, 'destroy'])->name('tikets.destroy');
});

Route::prefix('penumpang')->group(function () {
    Route::get('/', [PenumpangController::class, 'index'])->name('penumpangs.index');
    Route::post('/', [PenumpangController::class, 'search'])->name('penumpangs.search');
    Route::post('/store', [PenumpangController::class, 'store'])->name('penumpangs.store');
});
