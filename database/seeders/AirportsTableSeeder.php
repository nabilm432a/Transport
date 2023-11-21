<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('airports')->insert([
            [
                'name' => 'X Airport',
                'location_id' => '1',
                'contact' => '01245463463'
            ],
            [
                'name' => 'Z Airport',
                'location_id' => '4',
                'contact' => '02415367787'
            ],
        ]);
    }
}
