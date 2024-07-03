<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('product-category/get-data',[ProductCategoryController::class,'getData']);
Route::get('product-category/find/{id}',[ProductCategoryController::class,'find']);
Route::get('product-category/findName/{name}',[ProductCategoryController::class,'findName']);
Route::post('product-category/create',[ProductCategoryController::class,'create']);
Route::post('product-category/update/{id}',[ProductCategoryController::class,'update']);
Route::post('product-category/delete/{id}',[ProductCategoryController::class,'delete']);