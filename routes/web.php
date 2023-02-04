<?php

use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RealStockStatus;
use App\Http\Controllers\RealtimeStatusController;
use App\Http\Controllers\UserController;
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

Route::get('realstock/edit/{id}', [RealStockStatus::class, 'edit'])->middleware('auth'); //route untuk ke halaman edit data
Route::put('realstock/update/{id}', [RealStockStatus::class, 'update'])->middleware('auth'); //route untuk mengupdate data ke database
Route::post('realstock/update/{id}', [RealStockStatus::class, 'update'])->middleware('auth'); //route untuk mengupdate data ke database

Route::get('/', [UserController::class, 'index'])->name('index')->middleware(('auth'));

Route::resource('/realStock', RealtimeStatusController::class)->middleware('auth');
Route::put('/realStock', [RealtimeStatusController::class, 'update']);

Route::resource('/merchandise', MerchandiseController::class)->middleware('auth');
Route::resource('/store', StoreController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
