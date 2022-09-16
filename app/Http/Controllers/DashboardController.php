<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Canteen;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

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
