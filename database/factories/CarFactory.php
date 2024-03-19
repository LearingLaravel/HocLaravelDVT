<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Mf;
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
    protected $model = Car::class;

    public function definition()
    {
        return [
            'model' => $this->faker->word,
            'description' => $this->faker->sentence,
            'brand' => $this->faker->word,
            'produced_on' => $this->faker->date,
            'image' => $this->faker->imageUrl,
            'mf_id' => Mf::factory()->create()->id,
        ];
    }
}