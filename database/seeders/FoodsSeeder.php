<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            [
                'name' => 'PINE NUT SBRISALONA',
                'price' => '29.97',
                'description' => 'Sed fermentum eros vitae eros',
                'menu_id' => 5,
            ],
            [
                'name' => 'AENEAN EU',
                'price' => '19.35',
                'description' => 'Feugiat maximus neque pharetra',
                'menu_id' => 5,
            ],
            [
                'name' => 'SED FEUGIAT',
                'price' => '12.19',
                'description' => 'Proin lacinia nisl ut ultricies posuere nulla',
                'menu_id' => 5,
            ],
            [
                'name' => 'CONSECTETUR',
                'price' => '21.89',
                'description' => 'Etiam cursus facilisis tortor',
                'menu_id' => 5,
            ],

            [
                'name' => 'DUIS SED ALIQUET',
                'price' => '31.18',
                'description' => 'Proin lacinia nisl ut ultricies posuere nulla',
                'menu_id' => 7,
            ],
            [
                'name' => 'SUSPENDISSE',
                'price' => '70.25',
                'description' => 'Feugiat maximus neque pharetra',
                'menu_id' => 7,
            ],
            [
                'name' => 'SCELERISQUE SED',
                'price' => '36.19',
                'description' => 'Etiam cursus facilisis tortor',
                'menu_id' => 7,
            ],
            [
                'name' => 'MOLLIS NULLA',
                'price' => '19.50',
                'description' => 'Proin lacinia nisl ut ultricies posuere nulla',
                'menu_id' => 7,
            ],
            [
                'name' => 'CONVALLIS AUGUE',
                'price' => '29.15',
                'description' => 'Sed fermentum eros vitae eros',
                'menu_id' => 7,
            ],
            [
                'name' => 'MAECENAS TRISTIQUE',
                'price' => '29.79',
                'description' => 'Feugiat maximus neque pharetra',
                'menu_id' => 7,
            ],
            [
                'name' => 'DUIS TINCIDUNT',
                'price' => '19.35',
                'description' => 'Proin lacinia nisl ut ultricies posuere nulla',
                'menu_id' => 7,
            ],

            [
                'name' => 'VIVAMUS PRETIUM',
                'price' => '29.79',
                'description' => 'Sed fermentum eros vitae eros',
                'menu_id' => 4,
            ],
            [
                'name' => 'DUIS PHARETRA LIGULA',
                'price' => '19.35',
                'description' => 'Feugiat maximus neque pharetra',
                'menu_id' => 4,
            ],
            [
                'name' => 'IN EU DOLOR',
                'price' => '53.34',
                'description' => 'Proin lacinia nisl ut ultricies posuere nulla',
                'menu_id' => 4,
            ],
            [
                'name' => 'FEUGIAT MAXIMUS',
                'price' => '62.45',
                'description' => 'Sed fermentum eros vitae eros',
                'menu_id' => 4,
            ],

            [
                'name' => 'TEMPUS ALIQUET',
                'price' => '9.79',
                'description' => 'Proin lacinia nisl ut ultricies posuere nulla',
                'menu_id' => 6,
            ],
            [
                'name' => 'SCELERISQUE',
                'price' => '19.35',
                'description' => 'Sed fermentum eros vitae eros',
                'menu_id' => 6,
            ],
            [
                'name' => 'CRAS MAXIMUS',
                'price' => '5.79',
                'description' => 'Duis pharetra ligula at urna dignissim',
                'menu_id' => 6,
            ],

            [
                'name' => 'SED VARIUS',
                'price' => '29.79',
                'description' => 'Aenean pharetra tortor dui in pellentesque',
                'menu_id' => 1,
                'image' => 'lunch-01.jpg',
            ],
            [
                'name' => 'SBRISALONA',
                'price' => '29.79',
                'description' => 'Proin lacinia nisl ut ultricies posuere nulla',
                'menu_id' => 1,
                'image' => 'lunch-02.jpg',
            ],
            [
                'name' => 'TEMPUS ALIQUET',
                'price' => '45.09',
                'description' => 'Aenean condimentum ante erat',
                'menu_id' => 1,
                'image' => 'lunch-03.jpg',
            ],
            [
                'name' => 'CRAS EGET MAGNA',
                'price' => '45.09',
                'description' => 'Sed fermentum eros vitae eros',
                'menu_id' => 1,
                'image' => 'lunch-04.jpg',
            ],
            [
                'name' => 'DUIS MASSA',
                'price' => '12.75',
                'description' => 'Proin lacinia nisl ut ultricies posuere nulla',
                'menu_id' => 1,
                'image' => 'lunch-05.jpg',
            ],
            [
                'name' => 'NULLAM MAXIMUS',
                'price' => '12.75',
                'description' => 'Duis massa nibh porttitor nec imperdiet eget',
                'menu_id' => 1,
                'image' => 'lunch-06.jpg',
            ],

            [
                'name' => 'MAECENAS TRISTIQUE',
                'price' => '29.79',
                'description' => 'Aenean pharetra tortor dui in pellentesque',
                'menu_id' => 2,
                'image' => 'dinner-01.jpg',
            ],
            [
                'name' => 'CRAS MAXIMUS',
                'price' => '29.79',
                'description' => 'Proin lacinia nisl ut ultricies posuere nulla',
                'menu_id' => 2,
                'image' => 'dinner-02.jpg',
            ],
            [
                'name' => 'PINE NUT SBRISALONA',
                'price' => '45.09',
                'description' => 'Aenean condimentum ante erat',
                'menu_id' => 2,
                'image' => 'dinner-03.jpg',
            ],
            [
                'name' => 'PINE NUT SBRISALONA',
                'price' => '45.09',
                'description' => 'Sed fermentum eros vitae eros',
                'menu_id' => 2,
                'image' => 'dinner-04.jpg',
            ],
            [
                'name' => 'SUSPENDISSE EU',
                'price' => '12.75',
                'description' => 'Proin lacinia nisl ut ultricies posuere nulla',
                'menu_id' => 2,
                'image' => 'dinner-05.jpg',
            ],
            [
                'name' => 'TEMPOR MALESUADA',
                'price' => '12.75',
                'description' => 'Duis massa nibh porttitor nec imperdiet eget',
                'menu_id' => 2,
                'image' => 'dinner-06.jpg',
            ],
        ];

        foreach ($foods as $food) {
            if (isset($food['image'])) $food['image'] = 'images/food/' . $food['image'];
            Food::create($food);
        }
    }
}
