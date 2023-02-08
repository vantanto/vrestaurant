<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\CategoryBlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_blogs = CategoryBlog::all();
        for ($i=1; $i<=5; $i++) {
            $published = (2-$i) >= 0 ? '+'.(2-$i) : (2-$i);
            $blog = Blog::create([
                'title' => fake()->text(10),
                'published' => date('Y-m-d', strtotime($published.' days')),
                'description_short' => fake()->text(100),
                'description' => fake()->text(500),
                'bg_image' => 'images/blog/blog-' . substr('0'.$i, -2) . '.jpg', 
                'category_blog_id' => $category_blogs[rand(0, (count($category_blogs) - 1))]->id,
                'user_id' => 1,
            ]);
            $blog->slug = Str::slug($blog->id.' '.$blog->title);
            $blog->save();
        }
    }
}
