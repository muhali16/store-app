<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Controllers\Controller;
use App\Models\Canteen;
use App\Models\Cart;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index(){
        return view('main.welcome', [ 
            'title' => 'Kantin Kejujuran',
            // 'wallet' => Wallet::where('user_id', auth()->user()->id)->get(),
            'canteens' => Canteen::all(),
            'categories' => Category::all(),
        ]);
    }
}
