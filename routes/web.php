<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('cikis');
Route::post('/', [LoginController::class, 'login'])->name('login.validate');

Route::get('/template', [PagesController::class, 'templatecheck']);

Route::get('/user/list', [UsersController::class, 'index'])->name('kullanici.listesi');

Route::get('/user/add', [UsersController::class, 'create'])->name('kullanici.ekleme');
Route::post('/user/add', [UsersController::class, 'store'])->name('kullanici.ekle');

Route::get('/user/adj/{id}', [UsersController::class, 'edit'])->name('kullanici.duzenleme');
Route::post('/user/adj/{id}', [UsersController::class, 'update'])->name('kullanici.duzenle');

Route::get('/user/del/{id}', [UsersController::class, 'destroy'])->name('kullanici.silme');

Route::get('/category/list', [CategoriesController::class, 'Categorylist'])->name('kategori.listesi');
Route::get('/category/add', [CategoriesController::class, 'Categoryadd'])->name('kategori.ekleme');
Route::post('/category/adj', [CategoriesController::class, 'Categoryadj'])->name('kategori.duzenleme');
Route::post('/category/del', [CategoriesController::class, 'Categorydel'])->name('kategori.silme');

Route::get('/product/list', [ProductsController::class, 'Productlist'])->name('urun.listesi');
Route::get('/product/add', [ProductsController::class, 'Productadd'])->name('urun.ekleme');
Route::post('/product/del', [ProductsController::class, 'Productdel'])->name('urun.silme');