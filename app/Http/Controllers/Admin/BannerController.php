<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $banner_actives = Banner::where('active', true)
            ->get();
        $banners = Banner::orderBy('active', 'desc')
            ->orderByRaw('FIELD(id, '.implode(',', $banner_actives->pluck('id')->toArray()).')')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.banner.index', compact('banner_actives', 'banners'));
    }

    public function create(Request $request)
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'image' => 'required|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $banner = new Banner;
            $banner->image = Helper::fileStore($request->image, Banner::$ImagePath);
            $banner->active = $request->active ? 1 : 0;
            $banner->save();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'Banner Successfully Created.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Banner Failed Created.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'image' => 'sometimes|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $banner->image = Helper::fileUpdate($banner->image, $request->image, Banner::$ImagePath);
            $banner->active = $request->active ? 1 : 0;
            $banner->save();
            DB::commit();
    
            return response()->json(['status' => 'success', 'msg' => 'Banner Successfully Updated.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Banner Failed Updated.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        Helper::fileDelete($banner->image);
        $banner->delete();
        return redirect()->back()->with('success', 'Banner Successfully Deleted.');
    }
}
