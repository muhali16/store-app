<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
