<?php

use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RealStockStatusController;
use App\Http\Controllers\RealtimeStatusController;
use App\Http\Controllers\StoreStockController;
use App\Http\Controllers\TransactionController;
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

Route::get('realstock/edit/{id}', [RealStockStatusController::class, 'edit'])->middleware(('superUser')); //route untuk ke halaman edit data
Route::put('realstock/update/{id}', [RealStockStatusController::class, 'update'])->middleware(('superUser')); //route untuk mengupdate data ke database
Route::post('realstock/update/{id}', [RealStockStatusController::class, 'update'])->middleware(('superUser')); //route untuk mengupdate data ke database

Route::get('/', [UserController::class, 'index'])->name('index')->middleware(('auth'));
Route::get('/data-of-user', [UserController::class, 'show'])->middleware(('superUser'));
Route::post('/data-of-user/update/{idUser}', [UserController::class, 'update'])->middleware(('superUser'));

Route::resource('/realStock', RealtimeStatusController::class)->middleware('auth');
Route::put('/realStock', [RealtimeStatusController::class, 'update']);

Route::resource('/merchandise', MerchandiseController::class)->middleware('auth');

Route::resource('/store', StoreController::class)->middleware('auth');
// Route::resource('/store/store-stock', StoreStockController::class)->middleware('auth');

Route::get('/store/store-stock/create/{idStore}', [StoreStockController::class, 'create'])->middleware('middleUser');
Route::post('/store/store-stock/store/{idStore}', [StoreStockController::class, 'store'])->middleware('middleUser');
Route::get('/store/store-stock/edit/{idStoreStock}/{idStore}', [StoreStockController::class, 'edit'])->middleware('middleUser');
Route::put('/store/store-stock/update/{idStoreStock}/{idStore}', [StoreStockController::class, 'update'])->middleware('middleUser');
Route::post('/store/store-stock/update/{idStoreStock}/{idStore}', [StoreStockController::class, 'update'])->middleware('middleUser');
// Route::delete('/store/store-stock/destroy/{idStoreStock}/{idStore}', [StoreStockController::class, 'destroy'])->middleware('middleUser');

Route::resource('/transaction', TransactionController::class)->middleware('auth');
Route::get('/transaction/store-id/{idStore}', [TransactionController::class, 'createWithStore'])->name('transaction.store.show')->middleware('auth');
Route::get('/transaction/store-id/{idStore}/exportCSV', [TransactionController::class, 'exportCSV'])->middleware('auth');
Route::get('/transaction/store-id/{idStore}/exportExcel', [TransactionController::class, 'exportExcel'])->middleware('auth');
Route::get('/transaction/store-id/{idStore}/create', [TransactionController::class, 'create'])->middleware('auth');
Route::post('/transaction/store-id/{idStore}/store', [TransactionController::class, 'store'])->middleware('auth');

Route::get('/copyright' , function () {
return view('pages.copyright');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
