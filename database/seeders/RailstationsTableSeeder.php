<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RailstationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('railstations')->insert([
            [
                'name' => 'Railstation A',
                'location_id' => '2',
                'contact' => '01123124255'
            ],
            [
                'name' => 'Railstation B',
                'location_id' => '4',
                'contact' => '01513312345'
            ],
        ]);
    }
}
