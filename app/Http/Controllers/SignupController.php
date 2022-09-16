<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index(){
        return view('signup.index', [
            'title' => 'Signup',
        ]);
    }
}
