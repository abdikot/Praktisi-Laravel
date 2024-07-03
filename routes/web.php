<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GetApiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function(){
    return view('login');
});



Route::get('/register', [RegisterController::class, 'index']);


Route::get('/get_data', [GetApiController::class, 'getData']);
Route::get('/comment/{id}', [GetApiController::class, 'comment'])->name('comment');

Route::resource('product-categories', ProductCategoryController::class);
Route::resource('product', ProductController::class);