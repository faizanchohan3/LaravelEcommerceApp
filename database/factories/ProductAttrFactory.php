<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\Size;
use App\Models\color;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductAttr>
 */
class ProductAttrFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductAttr::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'=>Product::inRandomOrder()->first()->id,
            'size_id' => Size::inRandomOrder()->first()->id,
            'color_id' => color::inRandomOrder()->first()->id,
            'qty' => $this->faker->numberBetween(1, 100),
            'sku' => 'Sku'.$this->faker->unique()->numberBetween(10000, 99999),
            'price' => $this->faker->numberBetween(1000, 50000),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
