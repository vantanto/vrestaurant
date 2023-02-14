<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::orderBy('active', 'desc')
            ->orderBy('id', 'desc');
        
        if ($request->search != null) {
            $menus->where('name', 'like', '%'.$request->search.'%');
        }
        if ($request->status != null) {
            $menus->where('active', $request->status);
        }
        
        $menus = $menus->paginate(10);
        return view('admin.menu.index', compact('menus'));
    }

    public function create(Request $request)
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'image' => 'sometimes|image',
            'bg_image' => 'sometimes|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $menu = new Menu;
            $menu->fill($request->only('name'));
            $menu->image = Helper::fileStore($request->image, Menu::$ImagePath);
            $menu->bg_image = Helper::fileStore($request->bg_image, Menu::$ImagePath, 'bg_'.date('YmdHis'));
            $menu->active = $request->active ? 1 : 0;
            $menu->save();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'Menu Successfully Created.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Menu Failed Created.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'image' => 'sometimes|image',
            'bg_image' => 'sometimes|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $menu->fill($request->only('name'));
            $menu->image = Helper::fileUpdate($menu->image, $request->image, Menu::$ImagePath);
            $menu->bg_image = Helper::fileUpdate($menu->bg_image, $request->bg_image, Menu::$ImagePath, 'bg_'.date('YmdHis'));
            $menu->active = $request->active ? 1 : 0;
            $menu->save();
            DB::commit();
    
            return response()->json(['status' => 'success', 'msg' => 'Menu Successfully Updated.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Menu Failed Updated.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $meu = Menu::findOrFail($id);
        // Helper::fileDelete($meu->image);
        // Helper::fileDelete($meu->bg_image);
        $meu->delete();
        return redirect()->back()->with('success', 'Menu Successfully Deleted.');
    }
}
