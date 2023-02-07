<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menus_highlight_id = [1, 2];
        $menus_lr = [ 
            [5, 4], 
            [7, 6] 
        ];
        foreach ($menus_lr as $key => $menu) {
            $menus_lr[$key] = Menu::with('foods')
                ->where('active', true)
                ->whereIn('id', $menu)
                ->orderByRaw('FIELD(id, '.implode(',', $menu).')')
                ->get();
        }
        $menus_highlight = Menu::with('foods')
            ->where('active', true)
            ->whereIn('id', $menus_highlight_id)
            ->get();
        return view('menu.index', compact('menus_lr', 'menus_highlight'));
    }
}
