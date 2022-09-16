<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Canteen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CanteenDahboardController extends Controller
{
    public function index()
    {
        $this->authorize('canteen-dashboard');
        $recomended_menus = Menu::where('is_recomended', 'on')->where('is_active', 'on')->get();
        $all_menus = Menu::where('is_active', 'on')->get();
        
        $menus = Menu::where('is_active', 'on')->get();
        $counts = $menus->countBy(function($menu){
            return $menu->category_id;
        });
        $categories_temp = array_keys($counts->all()) ;
        $categories = [];
        foreach($categories_temp as $cat){
            foreach(Category::all() as $cate){
                if($cat == $cate->id){
                    $cat = $cate->name;
                    $categories[] = $cat;
                }
            }
        }

        $categories_temp = collect($categories_temp);

        $categories = $categories_temp->combine($categories);
        return view('canteen-dashboard.index', [
            'title' => 'Dashboard - ' . auth()->user()->canteen->nama_kantin,
            'canteen' => Canteen::find(auth()->user()->canteen->id),
            'menus' => $all_menus,
            'categories' => $categories,
            'recomended_menus' => $recomended_menus,
        ]);
    }
}
