<?php

namespace Database\Factories;

use App\Models\Mission;
use Illuminate\Database\Eloquent\Factories\Factory;

class MissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => $this->faker->text(),
            'title' => $this->faker->text(),
            'comment' => $this->faker->text(),
            'deposit' => $this->faker->randomNumber(),
            'ended_at' => $this->faker->date()
        ];
    }
}
