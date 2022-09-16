<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canteen extends Model
{
    use HasFactory;
    
    // protected $fillable = ['bio', 'name'];

    protected $guarded = ['id'];

    public $attributes = [
        'status' => 0,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}