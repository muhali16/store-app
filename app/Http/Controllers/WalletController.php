<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function store(Request $request){
        if(!Auth::check()){
            return abort(403);
        }
        $request->validate([
            'wallet_name' => 'required|min:5',
            'no_hp' => 'required|unique:wallets|min:11|max:13',
            'jalan' => 'required|max:30',
            'kota' => 'required|max:30',
            'provinsi' => 'required|max:30',
        ]);

        $address = $request->jalan . ', ' . $request->kota . ', ' .$request->provinsi . '.';
        $address = str()->of($address)->title();

        $result = Wallet::create([
            'user_id' => Auth::user()->id,
            'saldo' => 0,
            'wallet_name' => $request->wallet_name,
            'no_hp' => $request->no_hp,
            'alamat' => $address,
        ]);

        if($result){
            return redirect('/')->with('success-wallet', 'Yeay, Wallet kamu sudah dibuat. <br>Selamat Berbelanja!');
        } else {
            return abort(400);
        }
        
    }
}
