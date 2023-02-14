<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::where('active', true)->get();
        $foods = Food::with('menu')
            ->orderBy('active', 'desc')
            ->orderBy('id', 'desc');

        if ($request->search != null) {
            $foods->where(
                fn($query) =>
                $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('price', 'like', '%'.$request->search.'%')
            );
        }
        if ($request->status != null) {
            $foods->where('active', $request->status);
        }
        if ($request->menu != null) {
            $foods->where('menu_id', $request->menu);
        }

        $foods = $foods->paginate(10);
        return view('admin.food.index', compact('foods', 'menus'));
    }

    public function create(Request $request)
    {
        $menus = Menu::where('active', true)->get();
        return view('admin.food.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|string',
            'description' => 'sometimes|string',
            'image' => 'nullable|image',
            'menu' => 'nullable|exists:menus,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $food = new Food;
            $food->fill($request->only('name', 'price', 'description'));
            $food->menu_id = $request->menu;
            $food->image = Helper::fileStore($request->image, Food::$ImagePath);
            $food->active = $request->active ? 1 : 0;
            $food->save();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'Food Successfully Created.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Food Failed Created.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function detail(Request $request)
    {
        $food = Food::with('menu')->find($request->id);
        if ($food) {
            return response()->json(['status' => 'success', 'msg' => 'Data Found.', 'data' => $food]);
        }
        return response()->json(['status' => 'error', 'msg' => 'No Data Found.'], 404);
    }

    public function edit(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        $menus = Menu::where('active', true)->get();
        return view('admin.food.edit', compact('food', 'menus'));
    }

    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|string',
            'description' => 'sometimes|string',
            'image' => 'nullable|image',
            'menu_id' => 'nullable|exists:menus',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validator', 'msg' => $validator->messages()], 400);
        }

        DB::beginTransaction();
        try {
            $food->fill($request->only('name', 'price', 'description'));
            $food->menu_id = $request->menu;
            $food->image = Helper::fileUpdate($food->image, $request->image, Food::$ImagePath);
            $food->active = $request->active ? 1 : 0;
            $food->save();
            DB::commit();
    
            return response()->json(['status' => 'success', 'msg' => 'Food Successfully Updated.']);
        } catch (\Throwable $ex) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Food Failed Updated.', 'data' => $ex->getMessage()], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        Helper::fileDelete($food->image);
        $food->delete();
        return redirect()->back()->with('success', 'Food Successfully Deleted.');
    }
}
