<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Chef;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $about_main = About::select('title', 'subtitle', 'description', 'image')
            ->where('is_main', true)
            ->first();
        $abouts = About::select('title', 'subtitle', 'description', 'image')
            ->where('active', true)
            ->where('is_main', false)
            ->limit(2)
            ->get();
        $chefs = Chef::where('active', true)
            ->limit(3)
            ->get();
        return view('about.index', compact('about_main', 'abouts', 'chefs'));
    }
}
