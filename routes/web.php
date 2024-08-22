<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\StokController;

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
    return view('dashboard/index');
});

Route::get('/barang/index', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barangcreate');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barangstore');
Route::get('/barang/edit/{IdBarang}', [BarangController::class, 'edit'])->name('barangedit');
Route::put('/barang/update/{IdBarang}', [BarangController::class, 'update'])->name('barang.update');
Route::put('barang/delete/{IdBarang}', [BarangController::class, 'delete'])->name('barangdelete');

Route::get('/stok/index', [StokController::class, 'index'])->name('barang.index');
Route::get('/stok/create', [StokController::class, 'create'])->name('stok.create');
Route::post('/stok/store', [StokController::class, 'store'])->name('stok.store');
Route::get('/stok/edit/{IdStok}', [StokController::class, 'edit'])->name('stok.edit');
Route::put('/stok/update/{IdStok}', [StokController::class, 'update'])->name('stok.update');
Route::put('stok/delete/{IdStok}', [StokController::class, 'delete'])->name('stok.delete');
