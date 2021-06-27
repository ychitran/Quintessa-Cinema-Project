<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'room_name' => 'H01',
            'cinema_id' => 1
        ]);

        DB::table('rooms')->insert([
            'room_name' => 'H02',
            'cinema_id' => 1
        ]);
    }
}
