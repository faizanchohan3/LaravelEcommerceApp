<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

             // Ensure there are categories and brands before creating products
             if (\App\Models\Category::count() === 0) {
                \App\Models\Category::factory()->count(5)->create(); // Create 5 dummy categories if none exist
            }
            if (\App\Models\Brand::count() === 0) {
                 \App\Models\Brand::factory()->count(5)->create(); // Create 5 dummy brands if none exist
            }

            Product::factory()->count(50)->create(); // Create 50 dummy products
    }
}
