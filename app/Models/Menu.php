<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'harga', 'deskripsi', 'photo' ,'category_id', 'canteen_id'];

    protected $guarded = ['id'];

    public $attributes = [
        'is_recomended' => null,
        'is_active' => 'on',
        'is_empty' => null,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function item()
    {
        return $this->hasOne(Item::class);
    }
}
