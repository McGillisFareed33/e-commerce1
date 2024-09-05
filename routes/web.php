<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;


Route::get('/login', [PagesController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.validate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([CheckRole::class])->group(function () {
    Route::get('/anasayfa', [PagesController::class, 'anasayfa'])->name('anasayfa');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/list', [UsersController::class, 'index'])->name('list');
    Route::get('/add', [UsersController::class, 'create'])->name('create');
    Route::post('/add', [UsersController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [UsersController::class, 'update'])->name('update');
    Route::get('/del/{id}', [UsersController::class, 'destroy'])->name('delete');
});

Route::prefix('category')->name('category.')->group(function () {
    Route::get('/list', [CategoriesController::class, 'index'])->name('list');
    Route::get('/add', [CategoriesController::class, 'create'])->name('create');
    Route::post('/add', [CategoriesController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [CategoriesController::class, 'update'])->name('update');
    Route::get('/del/{id}', [CategoriesController::class, 'destroy'])->name('delete');
});

Route::prefix('product')->name('product.')->group(function () {
    Route::get('/list', [ProductsController::class, 'index'])->name('list');
    Route::get('/add', [ProductsController::class, 'create'])->name('create');
    Route::post('/add', [ProductsController::class, 'store'])->name('store');
    Route::get('/{id}/upload',[ProductsController::class, 'edit'])->name('edit');
    Route::post('/{id}/upload',[ProductsController::class, 'update'])->name('update');
    Route::get('/del/{id}', [ProductsController::class, 'destroy'])->name('delete');
});
});
