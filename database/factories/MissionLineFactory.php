<?php

namespace Database\Factories;

use App\Models\MissionLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class MissionLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MissionLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'quantity' => $this->faker->randomNumber(),
            'price' => $this->faker->randomNumber(),
            'unity' => $this->faker->randomElement(['jour', 'semaine', 'mois'])
        ];
    }
}
