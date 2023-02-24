<?php

namespace Database\Seeders;

use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = Reservation::factory()
            ->count(250)
            ->make();
        foreach ($reservations as $reservation) {
            $reservation->code = (new ReservationController)->generateCode($reservation['date']);
            $reservation->save();
        }
    }
}
