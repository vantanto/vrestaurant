<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'bg_image',
        'active',
    ];

    public static $ImagePath = 'images/menu/';

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
