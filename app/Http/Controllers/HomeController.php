<?php

namespace App\Http\Controllers;

use App\Models\{About, Product, ProductCategory, Award};
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
                $testimonials = Testimonial::all();

         $about = About::first() ?? (object) ['title' => '', 'description' => ''];
        $categories = ProductCategory::all();
        $products = Product::with('category')->latest()->take(10)->get(); 
        $awards = Award::latest()->take(6)->get(); // Grid only, no links
        $blogs = Blog::latest()->take(6)->get(); 

        return view('home.index', compact('about', 'categories', 'products', 'awards','testimonials','blogs'));
    }
}
