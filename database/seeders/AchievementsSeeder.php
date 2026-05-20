<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('personalities')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $achievements = [
            [
                'title' => 'First Step',
                'description' => 'Complete your first habit'
            ],
            [
                'title' => 'Consistency is Key',
                'description' => 'Complete a habit 7 days in a row'
            ],
            [
                'title' => 'Unstoppable',
                'description' => 'Complete a habit 30 days in a row'
            ],
            [
                'title' => 'Overachiever',
                'description' => 'Complete 5 different habits in one day'
            ],
            [
                'title' => 'Habit Master',
                'description' => 'Complete all your habits for a full month'
            ]

        ];

        DB::table('achievements')->insert($achievements);
    }
}
