<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryGalleries = [
            Gallery::$Category['1'] => [7, 18, 19, 20],
            Gallery::$Category['2'] => [1, 3, 4, 5, 6, 8, 14, 16, 17],
            Gallery::$Category['3'] => [13, 15, 21],
            Gallery::$Category['4'] => [2, 9, 10],
            null => [11, 12],
        ];
        foreach ($categoryGalleries as $keyCategory => $categoryGallery) {
            foreach ($categoryGallery as $gallery) {
                Gallery::create([
                    'image' => 'images/gallery/photo-gallery-'.substr('0'.$gallery, -2).'.jpg',
                    'category' => $keyCategory ?: null,
                ]);
            }
        }
    }
}
