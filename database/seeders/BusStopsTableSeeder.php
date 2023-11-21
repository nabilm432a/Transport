<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusStopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bus_stops')->insert([
            [
                'name' => 'Bashundhara Stop',
                'location_id' => '1'
            ],
            [
                'name' => 'Banani Stop',
                'location_id' => '2'
            ],
            [
                'name' => 'Gulshan Stop',
                'location_id' => '3'
            ],
            [
                'name' => 'Farmgate Stop',
                'location_id' => '4'
            ],
        ]);
    }
}
