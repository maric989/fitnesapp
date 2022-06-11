<?php

namespace Database\Seeders;

use App\Models\Intensity;
use Illuminate\Database\Seeder;

class IntensitySeeder extends Seeder
{
    const INTENSITIES = [
        'intensity 1',
        'intensity 2',
        'intensity 3',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::INTENSITIES as $intensity) {
            Intensity::create([
                'name' => $intensity
            ]);
        }
    }
}
