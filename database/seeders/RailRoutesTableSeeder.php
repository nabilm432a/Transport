<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RailRoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rail_routes')->insert([
            [
                'source_id' => '1',
                'destination_id' => '2',
                'fare' => '90'
            ],
            [
                'source_id' => '2',
                'destination_id' => '1',
                'fare' => '90'
            ],
        ]);
    }
}
