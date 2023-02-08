<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = ['avatar-02.jpg', 'avatar-03.jpg', 'avatar-05.jpg'];
        foreach ($reviews as $review) {
            Review::create([
                'name' => fake()->name(),
                'rating' => rand(1, 5),
                'comment' => fake()->text(500),
                'city' => fake()->city(),
                'image' => 'images/chef/'.$review
            ]);
        }
    }
}
