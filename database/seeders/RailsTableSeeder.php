<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rails')->insert([
            [
                'license_number' => '1551585939',
                'capacity' => '100'
            ],
            [
                'license_number' => '1245151555',
                'capacity' => '110'
            ],
        ]);
    }
}
