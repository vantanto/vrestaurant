<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Gallery::$Category;
        $galleries = Gallery::where('active', true)
            ->orderBy('id', 'desc')
            ->paginate(12);
        return view('gallery.index', compact('categories', 'galleries'));
    }
}
