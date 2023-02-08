<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $today = date('Y=m-d');
        $blogs = Blog::with(['user', 'categoryBlog'])
            ->select('title', 'slug', 'published', 'description_short', 'category_blog_id', 'bg_image', 'user_id')
            ->where('published', '<=', $today)
            ->orderBy('published', 'desc');

        if ($request->search != null) {
            $blogs->where(function ($query) use ($request) {
                $query->where('title', 'like', '%'.$request->search.'%')
                    ->orWhere('published', $request->search);
            });
        }
        if ($request->category != null) {
            $blogs->where('category_blog_id', $request->category);
        }
        if ($request->month != null) {
            $blogs->whereMonth('published', date('m', strtotime($request->month)))
                ->whereYear('published', date('Y', strtotime($request->month)));
        }
        
        $blogs = $blogs->paginate(3);
        return view('blog.index', compact('blogs'));
    }

    public function show(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('blog'));
    }
}
