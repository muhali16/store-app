<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    public function auth(Request $request){
        $data = $request->validate([
            'email' => 'email|required|exists:users',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        } 
        
        return back()->with('failed-login', 'Login gagal! Sepertinya kamu lupa salah email atau password.');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
