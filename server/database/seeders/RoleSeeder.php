<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'Administrator',
            'salary' => '20000000'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Cinema Manager',
            'salary' => '14000000'
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Cinema Sales',
            'salary' => '7000000'
        ]);
    }
}
