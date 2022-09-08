<?php

namespace App\Http\Controllers;

use App\Models\Canteen;
use Illuminate\Http\Request;

class CanteenDahboardController extends Controller
{
    public function index()
    {
        $this->authorize('canteen-dashboard');
        return view('canteen-dashboard.index', [
            'title' => 'Dashboard - ' . auth()->user()->canteen->nama_kantin,
            'canteen' => Canteen::find(auth()->user()->canteen->id),
        ]);
    }
}
