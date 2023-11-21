<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buses')->insert([
            [
                'license_number' => '817658182947',
                'model' => 'AV52-C1',
                'capacity' => '50'
            ],
            [
                'license_number' => '262727346241',
                'model' => 'AX52-C1',
                'capacity' => '50'
            ],
        ]);
    }
}
