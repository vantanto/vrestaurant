<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_start',
        'date_end',
        'title',
        'description',
        'image',
        'bg_image',
        'active',
    ];
}
