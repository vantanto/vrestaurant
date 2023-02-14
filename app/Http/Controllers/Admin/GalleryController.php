<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Gallery::$Category;
        $galleries = Gallery::orderBy('active', 'desc')
            ->orderBy('id', 'desc');
        
        if ($request->status != null) {
            $galleries->where('active', $request->status);
        }
        if ($request->category != null) {
            $galleries->where('category', $request->category);
        }

        $galleries = $galleries->paginate(10);
        return view('admin.gallery.index', compact('categories', 'galleries'));
    }

    public function create(Request $request)
    {
        $categories = Gallery::$Category;
        return view('admin.gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'image' => 'required|image',
            'category' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $gallery = new Gallery;
            $gallery->fill($request->only('category'));
            $gallery->image = Helper::fileStore($request->image, Gallery::$ImagePath);
            $gallery->active = $request->active ? 1 : 0;
            $gallery->save();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'Gallery Successfully Created.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Gallery Failed Created.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $categories = Gallery::$Category;
        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'image' => 'sometimes|image',
            'category' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $gallery->fill($request->only('category'));
            $gallery->image = Helper::fileUpdate($gallery->image, $request->image, Gallery::$ImagePath);
            $gallery->active = $request->active ? 1 : 0;
            $gallery->save();
            DB::commit();
    
            return response()->json(['status' => 'success', 'msg' => 'Gallery Successfully Updated.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Gallery Failed Updated.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        Helper::fileDelete($gallery->image);
        $gallery->delete();
        return redirect()->back()->with('success', 'Gallery Successfully Deleted.');
    }
}
