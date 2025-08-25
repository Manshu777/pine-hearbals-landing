<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

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
Route::get('/records/{record}/preview', function (\App\Models\Record $record) {
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.record', [
        'record' => $record,
    ]);
    return $pdf->stream("record_{$record->id}.pdf");
})->name('records.preview');


Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');