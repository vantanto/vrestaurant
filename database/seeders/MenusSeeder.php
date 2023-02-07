<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'Lunch',
                'image' => 'our-menu-01.jpg',
                'bg_image' => 'images/header-menu-01.jpg',
            ],
            [
                'name' => 'Dinner',
                'image' => 'our-menu-05.jpg',
                'bg_image' => 'images/header-menu-02.jpg',
            ],
            [
                'name' => 'Happy Hour',
                'image' => 'our-menu-13.jpg',
            ],
            [
                'name' => 'Drink',
                'image' => 'our-menu-08.jpg',
            ],
            [
                'name' => 'Starters',
                'image' => 'our-menu-10.jpg',
            ],
            [
                'name' => 'Dessert',
                'image' => 'our-menu-16.jpg',
            ],
            [
                'name' => 'Main',
                'image' => 'our-menu-04.jpg',
            ],
        ];

        foreach ($menus as $menu) {
            if (isset($menu['image'])) $menu['image'] = $menu['image'];
            Menu::create($menu);
        }
    }
}
