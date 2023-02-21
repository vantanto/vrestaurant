<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $category_blogs = CategoryBlog::all();
        $blogs = Blog::with('categoryBlog')
            ->orderBy('id', 'desc');
        
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

        $blogs = $blogs->paginate(10);
        return view('admin.blog.index', compact('category_blogs', 'blogs'));
    }

    public function create(Request $request)
    {
        $category_blogs = CategoryBlog::all();
        return view('admin.blog.create', compact('category_blogs'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string',
            'published' => 'required|date',
            'description_short' => 'required|string',
            'description' => 'required|string',
            'category' => 'nullable|exists:category_blogs,id',
            'bg_image' => 'required|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $blog = new Blog;
            $blog->fill($request->only('title', 'published', 'description_short', 'description'));
            $blog->category_blog_id = $request->category;
            $blog->bg_image = Helper::fileStore($request->bg_image, Blog::$ImagePath, 'bg_'.date('YmdHis'));
            $blog->user_id = Auth::id();
            $blog->save();

            $blog->slug = \Str::slug($blog->id.' '.$blog->title);
            $blog->save();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'Blog Successfully Created.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Blog Failed Created.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function show(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('admin.blog.show', compact('blog'));
    }

    public function edit(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $category_blogs = CategoryBlog::all();
        return view('admin.blog.edit', compact('blog', 'category_blogs'));
    }

    public function update(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string',
            'published' => 'required|date',
            'description_short' => 'required|string',
            'description' => 'required|string',
            'category' => 'nullable|exists:category_blogs,id',
            'bg_image' => 'sometimes|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $blog->fill($request->only('title', 'published', 'description_short', 'description'));
            $blog->category_blog_id = $request->category;
            $blog->bg_image = Helper::fileUpdate($blog->bg_image, $request->bg_image, Blog::$ImagePath, 'bg_'.date('YmdHis'));
            $blog->user_id = Auth::id();
            $blog->save();

            $blog->slug = \Str::slug($blog->id.' '.$blog->title);
            $blog->save();
            DB::commit();

            return response()->json(['status' => 'success', 'msg' => 'Blog Successfully Updated.', 'href' => route('blogs.edit', $blog->slug)]);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Blog Failed Updated.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function destroy(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        // Helper::fileDelete($blog->bg_image);
        $blog->delete();
        return redirect()->back()->with('success', 'Blog Successfully Deleted.');
    }
}
