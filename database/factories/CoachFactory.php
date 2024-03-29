<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CoachFactory extends Factory
{
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'about' => $this->faker->text(),
            'bio' => $this->faker->text(80),
            'experience' => rand(1,10)
        ];
    }

}
