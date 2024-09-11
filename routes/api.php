<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//namespace use yerine geçer
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\api\V1'], function(){
Route::apiResource('categories', CategoriesController::class);
Route::apiResource('products', ProductsController::class);
Route::apiResource('users', UsersController::class);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});
