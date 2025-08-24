<?php

// app/Http/Controllers/Api/ProductCategoryController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = ProductCategory::with('products')->findOrFail($id);
        return response()->json($category);
    }
}