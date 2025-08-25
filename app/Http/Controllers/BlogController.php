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
           return ('<h3>Hello  </h3>');
    }
}
