<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_prices')->insert([
            'format_id' => 1,
            'normal_price' => 50000,
            'member_price' => 45000,
            'weekend_price' => 60000,
            'holiday_price' => 75000
        ]);

        DB::table('ticket_prices')->insert([
            'format_id' => 2,
            'normal_price' => 65000,
            'member_price' => 55000,
            'weekend_price' => 80000,
            'holiday_price' => 95000
        ]);
    }
}
