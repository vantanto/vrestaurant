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
        for ($i=1; $i<=12; $i++) {
            Gallery::create([
                'image' => 'images/gallery/photo-gallery-'.substr('0'.$i, -2).'.jpg'
            ]);
        }
    }
}
