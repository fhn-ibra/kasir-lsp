<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;

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

Route::group(['middleware' => ['guest']], function() { 
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/proses', [LoginController::class, 'login'])->name('proses');
});

Route::group(['middleware' => ['auth']], function() { 
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/produk/save', [ProdukController::class, 'save'])->name('produk-save');
    Route::post('/produk/delete', [ProdukController::class, 'delete'])->name('produk-delete');
    Route::post('/produk/edit', [ProdukController::class, 'edit'])->name('produk-edit');
    
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/akun/save', [UserController::class, 'save'])->name('akun-save');
    Route::post('/akun/delete', [UserController::class, 'delete'])->name('akun-delete');
    Route::post('/akun/edit', [UserController::class, 'edit'])->name('akun-edit');
});



