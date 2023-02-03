<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        $this->call([
            BannersSeeder::class,
            AboutsSeeder::class,
            MenusSeeder::class,
            EventsSeeder::class,
            TimesSeeder::class,
            GalleriesSeeder::class,
        ]);

        File::copyDirectory(public_path('seeders/images'), storage_path('app/public/images'));
    }
}
