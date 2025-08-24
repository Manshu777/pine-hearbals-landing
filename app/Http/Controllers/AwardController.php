<?php

// app/Http/Controllers/AwardController.php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::all();
        return view('home.index', compact('awards'));
    }

    // Add CRUD methods if needed for admin
}