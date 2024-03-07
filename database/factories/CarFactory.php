<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => Str::random(10),
            'description' => Str::random(10),
            'brand' => 'car' . rand(1, 5) . '.png',
            'produced_on' => Carbon::now(),
            'image' =>  'https://example.com/uploads/' . Str::random(10) . '.jpg',
        ];
    }
}