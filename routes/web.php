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

Route::get('/user/list', [UsersController::class, 'index'])->name('user.list');
Route::get('/user/add', [UsersController::class, 'create'])->name('user.create');
Route::post('/user/add', [UsersController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
Route::post('/user/edit/{id}', [UsersController::class, 'update'])->name('user.update');
Route::get('/user/del/{id}', [UsersController::class, 'destroy'])->name('user.delete');

Route::get('/category/list', [CategoriesController::class, 'index'])->name('category.list');
Route::get('/category/add', [CategoriesController::class, 'create'])->name('category.create');
Route::post('/category/add', [CategoriesController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
Route::post('/category/edit/{id}', [CategoriesController::class, 'update'])->name('category.update');
Route::get('/category/del/{id}', [CategoriesController::class, 'destroy'])->name('category.delete');

Route::get('/product/list', [ProductsController::class, 'index'])->name('product.list');
Route::get('/product/add', [ProductsController::class, 'create'])->name('product.create');
Route::post('/product/add', [ProductsController::class, 'store'])->name('product.store');
Route::get('/product/del/{id}', [ProductsController::class, 'destroy'])->name('product.delete');