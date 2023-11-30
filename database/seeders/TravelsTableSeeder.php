<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('travels')->insert([
            [
                'id' => 1,
                'transport_mode' => 'bus',
                'bus_route_id' => 1,
                'departure_bus_stop_id' => 1,
                'arrival_bus_stop_id' => 3,
                'bus_id' => 2,
                'departure_time' => '2023-12-01 10:00:00',
                'arrival_time' => '2023-12-01 12:00:00',
                'total_seats' => '50',
            ],
            [
                'id' => 2,
                'transport_mode' => 'bus',
                'bus_route_id' => 2,
                'departure_bus_stop_id' => 3,
                'arrival_bus_stop_id' => 2,
                'bus_id' => 1,
                'departure_time' => '2023-12-01 15:00:00',
                'arrival_time' => '2023-12-01 17:00:00',
                'total_seats' => '50',
            ],
            [
                'id' => 3,
                'transport_mode' => 'airplane',
                'air_route_id' => 2,
                'departure_airport_id' => 2,
                'arrival_airport_id' => 1,
                'airplane_id' => 2,
                'departure_time' => '2023-12-02 12:00:00',
                'arrival_time' => '2023-12-02 13:00:00',
                'total_seats' => '80',
            ],
        ]);
    }
}
