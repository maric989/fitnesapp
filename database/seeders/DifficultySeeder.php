<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    const DIFFICULTIES = [
        'Beginner',
        'Intermediate',
        'Advanced'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::DIFFICULTIES as $difficulty) {
            Difficulty::create([
                'name' => $difficulty
            ]);
        }
    }
}
