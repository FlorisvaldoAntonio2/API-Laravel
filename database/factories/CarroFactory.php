<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Carro>
 */
class CarroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'modelo' => $this->faker->word(),
            'ano' => $this->faker->year(),
            'montadora' => $this->faker->word(),
            'cor' => $this->faker->colorName(),
            'placa' => "eag-7845",
        ];
    }
}
