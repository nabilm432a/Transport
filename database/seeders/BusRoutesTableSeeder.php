<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusRoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bus_routes')->insert([
            [
                'source_id' => '1',
                'destination_id' => '3',
                'fare' => '20'
            ],
            [
                'source_id' => '3',
                'destination_id' => '2',
                'fare' => '30'
            ],
        ]);
    }
}
