<?php


// app/Http/Controllers/Api/AwardController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::all();
        return response()->json($awards);
    }

    public function show($id)
    {
        $award = Award::findOrFail($id);
        return response()->json($award);
    }
}