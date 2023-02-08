<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'published',
        'description_short',
        'description',
        'bg_image',
        'category_blog_id',
        'user_id',
    ];

    public function categoryBlog()
    {
        return $this->belongsTo(CategoryBlog::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
