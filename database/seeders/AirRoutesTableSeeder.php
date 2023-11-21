<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirRoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('air_routes')->insert([
            [
                'source_id' => '1',
                'destination_id' => '2',
                'fare' => '2000'
            ],
            [
                'source_id' => '2',
                'destination_id' => '1',
                'fare' => '4000'
            ],
        ]);
    }
}
