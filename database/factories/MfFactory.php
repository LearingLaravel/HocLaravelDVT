<?php

namespace Database\Factories;

use App\Models\Mf; 
use Illuminate\Database\Eloquent\Factories\Factory;

class MfFactory extends Factory
{
    public function definition()
    {
        return [
            'mf_name' => $this->faker->name,
        ];
    }
}