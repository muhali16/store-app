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
        $item = Item::where('menu_id', $validated['menu_id'])
        ->where('cart_id', auth()->user()->cart->id)
        ->first();

        if($item){
            $validated['many'] += $item->many;
        }

        $validated['total_price'] = $menu->harga * $validated['many'];
        $validated['cart_id'] = auth()->user()->cart->id;
        $validated['note'] = $item->note ?? $request->note;

        Item::updateOrCreate([
            'menu_id' => $validated['menu_id'],
            'cart_id' => $validated['cart_id'],
        ], [
            'many' => $validated['many'],
            'note' => $validated['note'],
            'total_price' => $validated['total_price'],
        ]);
        
        $items = Item::where('cart_id', auth()->user()->cart->id)->get();
        $total_price = 0;
        $total_many = 0;
        foreach($items as $item){
            $total_price += $item->total_price;
            $total_many += $item->many;
        }

        Cart::find(auth()->user()->cart->id)->update(['harga_total' => $total_price, 'total_many' => $total_many]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        if(!auth()->check()){
            return redirect(route('login'));
        }

        $validated = $request->validate([
            'menu_id' => 'required',
            'many' => 'required|integer|min:1',
            'note' => 'string',
        ]);

        $menu = Menu::find($validated['menu_id']);

        $validated['total_price'] = $menu->harga * $validated['many'];
        $validated['cart_id'] = auth()->user()->cart->id;

        Item::find($request->item_id)->update($validated);

        $items = Item::where('cart_id', auth()->user()->cart->id)->get();
        $total_price = 0;
        $total_many = 0;
        foreach($items as $item){
            $total_price += $item->total_price;
            $total_many += $item->many;
        }

        Cart::find(auth()->user()->cart->id)->update(['harga_total' => $total_price, 'total_many' => $total_many]);
        
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        if(!auth()->check()){
            return redirect(route('login'));
        }

        $item = Item::find($request->item_id)->firstOrFail();
        $item->delete();

        $items = Item::where('cart_id', auth()->user()->cart->id)->get();
        $total_price = 0;
        $total_many = 0;
        foreach($items as $item){
            $total_price += $item->total_price;
            $total_many += $item->many;
        }
        Cart::find(auth()->user()->cart->id)->update(['harga_total' => $total_price, 'total_many' => $total_many]);

        return redirect()->back();
    }
}
