<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category; // Import the Category model
use App\Models\Brand;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productName = $this->faker->unique()->words(3, true); // Generate a few words for the name

        return [
            'name' => $productName,
            'slug' => Str::slug($productName),
            'item_code' => 'ITEM-' . $this->faker->unique()->randomNumber(5),
            'description' => $this->faker->paragraph(5),
            'image' => $this->faker->imageUrl(640, 480, 'shoes', true), // Generates a fake image URL
            'keyword' => $this->faker->words(5, true),
            'category_id' => Category::inRandomOrder()->first()->id, // Get a random existing category ID
            'brand_id' => Brand::inRandomOrder()->first()->id, // Get a random existing brand ID
            // 'created_at' and 'updated_at' will be handled automatically by Eloquent
        ];
    }
}
