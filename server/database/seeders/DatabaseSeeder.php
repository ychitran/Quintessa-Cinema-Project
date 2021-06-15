<?php

namespace Database\Seeders;

use App\Models\FormatFilm;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(FormatFilmSeeder::class);
        // $this->call(CinemaSeeder::class);
        $this->call(UserSeeder::class);
    }
}
