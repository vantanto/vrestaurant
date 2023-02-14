<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryBlogController extends Controller
{
    public function index(Request $request)
    {
        $category_blogs = CategoryBlog::orderBy('id', 'desc');
        
        if ($request->search != null) {
            $category_blogs->where('name', 'like', '%'.$request->search.'%');
        }

        $category_blogs = $category_blogs->paginate(10);
        return view('admin.category_blog.index', compact('category_blogs'));
    }

    public function create(Request $request)
    {
        return view('admin.category_blog.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $category_blog = new CategoryBlog;
            $category_blog->fill($request->only('name'));
            $category_blog->save();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'Category Blog Successfully Created.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Category Blog Failed Created.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $category_blog = CategoryBlog::findOrFail($id);
        return view('admin.category_blog.edit', compact('category_blog'));
    }

    public function update(Request $request, $id)
    {
        $category_blog = CategoryBlog::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $category_blog->fill($request->only('name'));
            $category_blog->save();
            DB::commit();
    
            return response()->json(['status' => 'success', 'msg' => 'Category Blog Successfully Updated.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Category Blog Failed Updated.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $category_blog = CategoryBlog::findOrFail($id);
        $category_blog->delete();
        return redirect()->back()->with('success', 'Category Blog Successfully Deleted.');
    }
}
