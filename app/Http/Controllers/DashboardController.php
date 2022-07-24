<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('welcome', [ 
            'title' => 'Kantin Kejujuran',
            // 'wallet' => Wallet::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
