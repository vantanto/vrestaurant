<?php

namespace Database\Seeders;

use App\Models\Chef;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChefsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chefs = [
            [
                'name' => 'Peter Hart',
                'position' => 'Chef',
                'description' => 'Donec porta eleifend mauris ut effici-tur. Quisque non velit vestibulum, lob-ortis mi eget, rhoncus nunc',
                'image' => 'avatar-02.jpg',
            ],
            [
                'name' => 'Joyce Bowman',
                'position' => 'Chef',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies felis a sem tempus tempus.',
                'image' => 'avatar-03.jpg',
            ],
            [
                'name' => 'Peter Hart',
                'position' => 'Chef',
                'description' => 'Phasellus aliquam libero a nisi varius, vitae placerat sem aliquet. Ut at velit nec ipsum iaculis posuere quis in sapien',
                'image' => 'avatar-05.jpg',
            ],
        ];

        foreach ($chefs as $chef) {
            $chef['image'] = 'images/chef/' . $chef['image'];
            Chef::create($chef);
        }
    }
}
