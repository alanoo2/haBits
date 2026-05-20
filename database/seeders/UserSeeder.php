<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('personalities')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('12345678'),
                'rol' => 'admin',
                'personality_id' => "1"
            ]
        ];

        DB::table('users')->insert($user);
    }
}
