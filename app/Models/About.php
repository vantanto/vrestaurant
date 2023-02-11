<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description_short',
        'description',
        'image',
        'is_main',
        'active',
    ];

    public static $ImagePath = 'images/about/';
}
