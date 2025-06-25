<?php

namespace Database\Seeders;

use App\Models\ProductAttr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (\App\Models\Size::count() === 0) {
            \App\Models\Size::factory()->count(5)->create(); // Create 5 dummy categories if none exist
        }
        if (\App\Models\color::count() === 0) {
             \App\Models\color::factory()->count(5)->create(); // Create 5 dummy brands if none exist
        }
        ProductAttr::factory()->count(50)->create();
    }
}
