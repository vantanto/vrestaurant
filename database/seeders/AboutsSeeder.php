<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title' => 'Italian Restaurant',
            'description_short' => 'Donec quis lorem nulla. Nunc eu odio mi. Morbi nec lobortis est. Sed fringilla, nunc sed imperdiet lacinia, nisl ante egestas mi, ac facilisis ligula sem id neque.',
            'description' => 'Fusce at risus eget mi auctor pulvinar. Suspendisse maximus venenatis pretium. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam purus purus, lacinia a scelerisque in, luctus vel felis. Donec odio diam, dignissim a efficitur at, efficitur et est. Pellentesque semper est ut pulvinar ullamcorper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla et leo accumsan, egestas velit ac, fringilla tortor. Sed varius justo sed luctus mattis.',
            'image' => 'images/about/our-story-01.jpg',
            'is_main' => true,
        ]);
        About::create([
            'title' => 'Romantic Restaurant',
            'description_short' => 'Phasellus lorem enim, luctus ut velit eget, con-vallis egestas eros.',
            'description' => 'Phasellus lorem enim, luctus ut velit eget, con-vallis egestas eros.',
            'image' => 'images/about/intro-01.jpg',
        ]);
        About::create([
            'title' => 'Delicious Food',
            'description_short' => 'Aliquam eget aliquam magna, quis posuere risus ac justo ipsum nibh urna',
            'description' => 'Aliquam eget aliquam magna, quis posuere risus ac justo ipsum nibh urna',
            'image' => 'images/about/intro-02.jpg',
        ]);
        About::create([
            'title' => 'Red Wines You Love',
            'description_short' => 'Sed ornare ligula eget tortor tempor, quis porta tellus dictum.',
            'description' => 'Sed ornare ligula eget tortor tempor, quis porta tellus dictum.',
            'image' => 'images/about/intro-04.jpg',
        ]);
    }
}
