<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $attributes = [
    //     'note' => null,
    // ];
    
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
