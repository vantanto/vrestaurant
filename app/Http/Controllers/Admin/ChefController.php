<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChefController extends Controller
{
    public function index(Request $request)
    {
        $chefs = Chef::orderBy('active', 'desc')
            ->orderBy('id', 'desc');

        if ($request->search != null) {
            $chefs->where(
                fn($query) =>
                $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('position', 'like', '%'.$request->search.'%')
            );
        }
        if ($request->status != null) {
            $chefs->where('active', $request->status);
        }

        $chefs = $chefs->paginate(10);
        return view('admin.chef.index', compact('chefs'));
    }

    public function create(Request $request)
    {
        return view('admin.chef.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'position' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $chef = new Chef;
            $chef->fill($request->only('name', 'position', 'description'));
            $chef->image = Helper::fileStore($request->image, Chef::$ImagePath);
            $chef->active = $request->active ? 1 : 0;
            $chef->save();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'Chef Successfully Created.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Chef Failed Created.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function detail(Request $request)
    {
        $chef = Chef::find($request->id);
        if ($chef) {
            return response()->json(['status' => 'success', 'msg' => 'Data Found.', 'data' => $chef]);
        }
        return response()->json(['status' => 'error', 'msg' => 'No Data Found.'], 404);
    }

    public function edit(Request $request, $id)
    {
        $chef = Chef::findOrFail($id);
        return view('admin.chef.edit', compact('chef'));
    }

    public function update(Request $request, $id)
    {
        $chef = Chef::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'position' => 'required|string',
            'description' => 'required|string',
            'image' => 'sometimes|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $chef->fill($request->only('name', 'position', 'description'));
            $chef->image = Helper::fileUpdate($chef->image, $request->image, Chef::$ImagePath);
            $chef->active = $request->active ? 1 : 0;
            $chef->save();
            DB::commit();
    
            return response()->json(['status' => 'success', 'msg' => 'Chef Successfully Updated.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Chef Failed Updated.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $chef = Chef::findOrFail($id);
        Helper::fileDelete($chef->image);
        $chef->delete();
        return redirect()->back()->with('success', 'Chef Successfully Deleted.');
    }
}
