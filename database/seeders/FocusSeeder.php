<?php

namespace Database\Seeders;

use App\Models\Focus;
use Illuminate\Database\Seeder;

class FocusSeeder extends Seeder
{
    const FOCUSES = [
        'lose weight',
        'get fit',
        'build muscle'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::FOCUSES as $focus) {
            Focus::create([
                'name' => $focus
            ]);
        }
    }
}
