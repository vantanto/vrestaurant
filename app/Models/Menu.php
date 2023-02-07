<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'bg_image',
        'active',
    ];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
