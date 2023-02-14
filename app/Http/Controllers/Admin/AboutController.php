<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $abouts = About::orderBy('is_main', 'desc')
            ->orderBy('active', 'desc')
            ->orderBy('id', 'desc');

        if ($request->search != null) {
            $abouts->where(
                fn($query) =>
                $query->where('title', 'like', '%'.$request->search.'%')
                    ->orWhere('subtitle', 'like', '%'.$request->search.'%')
            );
        }
        if ($request->status != null) {
            $abouts->where('active', $request->status);
        }

        $abouts = $abouts->paginate(10);
        return view('admin.about.index', compact('abouts'));
    }

    public function create(Request $request)
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string',
            'subtitle' => 'sometimes|string',
            'description_short' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $about = new About;
            $about->fill($request->only('title', 'subtitle', 'description_short', 'description'));
            $about->image = Helper::fileStore($request->image, About::$ImagePath);
            $about->active = $request->active ? 1 : 0;
            if ($request->main) {
                About::where('is_main', true)->update(['is_main' => false]);
                $about->is_main = 1;
            }
            $about->save();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'About Successfully Created.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'About Failed Created.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function show(Request $request, $id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.show', compact('about'));
    }

    public function edit(Request $request, $id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string',
            'subtitle' => 'sometimes|string',
            'description_short' => 'required|string',
            'description' => 'required|string',
            'image' => 'sometimes|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $about->fill($request->only('title', 'subtitle', 'description_short', 'description'));
            $about->image = Helper::fileUpdate($about->image, $request->image, About::$ImagePath);
            $about->active = $request->active ? 1 : 0;
            if ($request->main) {
                About::where('id', '!=', $about->id)
                    ->where('is_main', true)
                    ->update(['is_main' => false]);
                $about->is_main = 1;
            }
            $about->save();
            DB::commit();
    
            return response()->json(['status' => 'success', 'msg' => 'About Successfully Updated.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'About Failed Updated.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $about = About::findOrFail($id);
        Helper::fileDelete($about->image);
        $about->delete();
        return redirect()->back()->with('success', 'About Successfully Deleted.');
    }
}
