<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'image' => 'event-02.jpg',
                'bg_image' => 'bg-event-01.jpg',
            ],
            [
                'image' => 'event-06.jpg',
                'bg_image' => 'bg-event-02.jpg',
            ],
            [
                'image' => 'event-01.jpg',
                'bg_image' => 'bg-event-04.jpg',
            ],
        ];

        foreach ($events as $key => $event) {
            Event::create([
                'date_start' => date('Y-m-d 08:00:00', strtotime(' + '.($key+1).' months')),
                'date_end' => date('Y-m-t 23:59:59', strtotime(' + '.($key+1).' months')),
                'title' => 'Wines during specific nights',
                'description' => 'Donec quis lorem nulla. Nunc eu odio mi. Morbi nec lobortis est. Sed fringilla, nunc sed imperdiet lacinia',
                'image' => 'images/event/'.$event['image'],
                'bg_image' => 'images/event/'.$event['bg_image'],
            ]);
        }
    }
}
