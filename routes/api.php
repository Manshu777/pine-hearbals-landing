<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\AwardController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/about', [AboutController::class, 'index']);
Route::get('/awards', [AwardController::class, 'index']);
Route::get('/awards/{id}', [AwardController::class, 'show']);
Route::get('/categories', [ProductCategoryController::class, 'index']);
Route::get('/categories/{id}', [ProductCategoryController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);