<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'category',
        'active',
    ];

    public static $ImagePath = 'images/gallery/';
    public static $Category = [
        '1' => 'interior',
        '2' => 'food',
        '3' => 'events',
        '4' => 'vip_guests',
    ];
}
