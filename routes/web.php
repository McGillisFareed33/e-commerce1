<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('cikis');
Route::post('/', [LoginController::class, 'login'])->name('login.validate');

Route::get('/anasayfa', [PagesController::class, 'anasayfa']);

Route::get('/user/list', [UsersController::class, 'index'])->name('kullanici.listesi');
Route::get('/user/add', [UsersController::class, 'create'])->name('kullanici.ekleme');
Route::post('/user/add', [UsersController::class, 'store'])->name('kullanici.ekle');
Route::get('/user/adj/{id}', [UsersController::class, 'edit'])->name('kullanici.duzenleme');
Route::post('/user/adj/{id}', [UsersController::class, 'update'])->name('kullanici.duzenle');
Route::get('/user/del/{id}', [UsersController::class, 'destroy'])->name('kullanici.silme');

Route::get('/category/list', [CategoriesController::class, 'index'])->name('kategori.listesi');
Route::get('/category/add', [CategoriesController::class, 'create'])->name('kategori.ekleme');
Route::post('/category/add', [CategoriesController::class, 'store'])->name('kategori.ekle');
Route::get('/category/adj/{id}', [CategoriesController::class, 'edit'])->name('kategori.duzenleme');
Route::post('/category/adj/{id}', [CategoriesController::class, 'update'])->name('kategori.duzenle');
Route::get('/category/del/{id}', [CategoriesController::class, 'destroy'])->name('kategori.silme');

Route::get('/product/list', [ProductsController::class, 'index'])->name('urun.listesi');
Route::get('/product/add', [ProductsController::class, 'create'])->name('urun.ekleme');
Route::post('/product/add', [ProductsController::class, 'store'])->name('urun.ekle');
Route::get('/product/del/{id}', [ProductsController::class, 'destroy'])->name('urun.silme');