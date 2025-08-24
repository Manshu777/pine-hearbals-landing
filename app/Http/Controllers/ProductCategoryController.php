<?php

// app/Http/Controllers/ProductCategoryController.php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('home.index', compact('categories'));
    }

    public function show($slug)
    {
        $category = ProductCategory::where('slug', $slug)->firstOrFail();
        $products = $category->products;
        return view('category_show', compact('category', 'products'));
    }

    // Add CRUD methods if needed for admin
}