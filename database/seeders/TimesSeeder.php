<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $times = [];
        $starttime = strtotime("09:00");
        $endtime = strtotime("18:00");
        for ($i=$starttime; $i<=$endtime; $i=$i+30*60) {
            array_push($times, ['time' => date('H:i', $i)]);
        }

        Time::insert($times);
    }
}
