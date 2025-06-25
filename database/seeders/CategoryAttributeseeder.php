<?php

namespace Database\Seeders;

use App\Models\categoryattribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryAttributeseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        categoryattribute::factory()->count(50)->create();
    }
}
