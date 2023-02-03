<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'date',
        'time',
        'name',
        'phone',
        'email',
        'people',
        'status',
    ];

    public static $Status = [
        '1' => 'pending',
        '2' => 'confirmed',
        '3' => 'cancelled',
    ];
}
