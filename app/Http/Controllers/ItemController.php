<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Menu;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        if(!auth()->check()){
            return redirect(route('login'));
        }
        
        $validated = $request->validate([
            'menu_id' => 'required',
            'many' => 'required|min:1',
        ]);

        $menu = Menu::find($validated['menu_id']);
        $validated['total_price'] = $menu->harga * $request->many;
        $validated['cart_id'] = auth()->user()->cart->id;
        $validated['note'] = $request->note ?? null;

        Item::create($validated);

        return redirect()->back();

    }
}
