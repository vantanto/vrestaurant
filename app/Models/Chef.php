<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'description',
        'image',
        'active',
    ];

    public static $ImagePath = 'images/chef/';
}
