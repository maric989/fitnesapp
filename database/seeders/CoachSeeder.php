<?php

namespace Database\Seeders;

use App\Models\Coach;
use App\Models\File;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coaches = Coach::factory()->count(10)->create();
        $file = File::create([
            'name' => 'coach dummy',
            'full_path' => '/images/coach_dummy.png',
            'size' => 111
        ]);
        foreach ($coaches as $coach) {
            $coach->update([
                'profile_picture_id' => $file->id
            ]);
        }
    }
}
