<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home.index');
});


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/awards', [App\Http\Controllers\AwardController::class, 'index'])->name('awards');
Route::get('/categories', [App\Http\Controllers\ProductCategoryController::class, 'index'])->name('categories');
Route::get('/categories/{slug}', [App\Http\Controllers\ProductCategoryController::class, 'show'])->name('category.show');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/products/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
