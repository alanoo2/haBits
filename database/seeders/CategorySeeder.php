<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     #   DB::statement('SET FOREIGN_KEY_CHECKS=0;');
     #   DB::table('personalities')->truncate();
     #   DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = [
            ['name' => 'Health',       'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Productivity', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mindfulness',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Social',       'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Creativity',   'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Finance',      'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Learning',     'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Other',        'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('categories')->insert($categories);
    }
}
