<?php

namespace App\Http\Controllers;

use App\Models\{About, Product, ProductCategory, Award};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::first();
        $categories = ProductCategory::all();
        $products = Product::with('category')->latest()->paginate(8); // <-- paginate
        $awards = Award::latest()->take(6)->get();                  // grid only, no links

        return view('home.index', compact('about', 'categories', 'products', 'awards'));
    }
}
