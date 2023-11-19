<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            [
                'id' => 1,
                'city' => 'Bashundhara',
                'region' => 'Dhaka',
                'country' => 'Bangladesh',
            ],
            [
                'id' => 2,
                'city' => 'City 2',
                'region' => 'Dhaka',
                'country' => 'Bangladesh',
            ],
            [
                'id' => 3,
                'city' => 'City 3',
                'region' => 'Chittagong',
                'country' => 'Bangladesh',
            ],
            [
                'id' => 4,
                'city' => 'NYC',
                'region' => 'New York',
                'country' => 'United States of America',
            ]
        ]);
    }
}
