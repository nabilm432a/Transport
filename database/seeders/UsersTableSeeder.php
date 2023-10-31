<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Steve',
                'email' => 'steve@gmail.com',
                'contact' => '01829475935',
                'passport' => 'BR90124934',
                'password' => Hash::make('123456789'),
                'google_id' => null,
                'is_admin' => 0,
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'contact' => null,
                'passport' => null,
                'password' => Hash::make('987654321'),
                'google_id' => null,
                'is_admin' => 1,
            ],
        ]);
    }
}
