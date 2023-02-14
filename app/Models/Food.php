<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'foods';

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'menu_id',
        'active',
    ];

    public static $ImagePath = 'images/food/';

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
