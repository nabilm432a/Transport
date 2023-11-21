<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirplanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('airplanes')->insert([
            [
                'license_number' => '1975983175035',
                'model' => 'XVC241T',
                'capacity' => '65'
            ],
            [
                'license_number' => '12148959330',
                'model' => 'ASCF99DF',
                'capacity' => '80'
            ],
        ]);
    }
}
