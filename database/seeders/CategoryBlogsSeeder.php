<?php

namespace Database\Seeders;

use App\Models\CategoryBlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryBlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_blogs = ['Cooking Recipe', 'Delicioous Foods'];
        foreach ($category_blogs as $category_blog) {
            CategoryBlog::create([
                'name' => $category_blog
            ]);
        }
    }
}
