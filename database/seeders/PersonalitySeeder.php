<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('personalities')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $personalities = [
            [
                'name' => 'Openness',
                'description' => 'Curious, imaginative, intellectual, and deeply averse to monotony. They are driven by novelty, learning, and conceptual or aesthetic growth.',
                'image_path' => null
            ],
           [
                'name' => 'Conscientiousness',
                'description' => 'Disciplined, efficient, achievement-oriented, and highly organized. They are motivated by order, measurable progress, checklists, and the satisfaction of a job well done.',
                'image_path' => null
            ],
            [
                'name' => 'Extraversion',
                'description' => 'Energetic, enthusiastic, assertive, and recharged by social interaction. They are motivated by recognition, friendly competition, teamwork, and external rewards.',
                'image_path' => null
            ],
            [
                'name' => 'Agreeableness',
                'description' => 'Compassionate, cooperative, empathetic, and deeply invested in harmony and the well-being of others. They are driven by knowing their actions positively impact their community, family, or team.',
                'image_path' => null
            ],
            [
                'name' => 'Neuroticism',
                'description' => 'Emotionally sensitive, highly aware of potential risks, and prone to stress or self-criticism. They are motivated by anxiety reduction, a sense of control, mental clarity, and predictable environments.',
                'image_path' => null
           ] 
        ];

        DB::table('personalities')->insert($personalities);
    }
}
