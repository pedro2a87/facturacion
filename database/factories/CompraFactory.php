<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $producto    = Producto::all()->random();
        $precio_base = round($producto->precio / ($producto->impuesto/100 + 1),2);
        $impuesto    = $producto->precio - $precio_base;
        return [
            'impuesto' => $impuesto,
            'monto'    => $producto->precio,
            'user_id'  => $this->faker->numberBetween($min = 2, $max = 501),
            'producto_id' => $producto->id
        ];
    }
}
