<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('cikis');

Route::post('/', [LoginController::class, 'login'])->name('login.validate');

Route::get('/template', [PagesController::class, 'templatecheck']);

Route::get('/userlist', [PagesController::class, 'Userlist'])->name('kullanici.listesi');
Route::get('/useradd', [PagesController::class, 'Useradd'])->name('kullanici.ekleme');

Route::get('/productlist', [PagesController::class, 'Productlist'])->name('kategori.listesi');
Route::get('/productadd', [PagesController::class, 'Productadd'])->name('kategori.ekleme');

Route::get('/categorylist', [PagesController::class, 'Categorylist'])->name('urun.listesi');
Route::get('/categoryadd', [PagesController::class, 'Categoryadd'])->name('urun.ekleme');

