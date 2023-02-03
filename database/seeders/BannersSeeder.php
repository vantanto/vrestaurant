<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = ['master-slides-01.jpg', 'master-slides-02.jpg', 'master-slides-03.jpg'];
        foreach ($banners as $banner) {
            Banner::create([ 'image' => 'images/banner/' . $banner ]);
        }
    }
}
