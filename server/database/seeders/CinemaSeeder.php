<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cinemas')->insert([
            'cinema_name' => 'Quintessa Cinema Huế',
            'infomation' => 'Tầng 4 Big C Huế, 181 Bà Triệu, Phú Nhuận, Thành phố Huế, Thừa Thiên Huế'
        ]);
    }
}
