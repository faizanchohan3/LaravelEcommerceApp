<?php

namespace Database\Factories;

use App\Models\attributevalue;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryAttribute>
 */
class CategoryAttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>category::inRandomOrder()->first()->id,
            'attribute_id' =>attribut::inRandomOrder()->first()->id,

        ];
    }
}
