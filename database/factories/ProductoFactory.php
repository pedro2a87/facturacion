<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'      =>$this->faker->word(),
            'precio'      =>$this->faker->amount(10, 500, 2),
            'impuesto'    =>$this->faker->amount(1, 50, 2),
        ];
    }
}
