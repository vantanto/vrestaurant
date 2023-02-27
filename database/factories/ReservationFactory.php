<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Time;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $times = Time::where('active', true)->get();
        $statuses = Reservation::$Status;
        return [
            'date' => fake()->dateTimeBetween('-2 months', '+2 weeks')->format('Y-m-d'),
            'time' => $times[rand(0, (count($times) - 1))]->time,
            'name' => fake()->unique()->name(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'people' => fake()->numberBetween(1, 12),
            'status' => $statuses[rand(1, count($statuses))],
        ];
    }
}
