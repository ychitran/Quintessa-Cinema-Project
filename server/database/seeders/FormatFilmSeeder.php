<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('format_films')->insert([
            'format_name' => '2D',
        ]);

        DB::table('format_films')->insert([
            'format_name' => '3D',
        ]);
    }
}
