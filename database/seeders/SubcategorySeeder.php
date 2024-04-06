<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
          Subcategory::create([
                'name' => "Subcategory $i",
                'subcategory_code' => "SUB$i",
                'description' => "Description of Subcategory $i",
                'category_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
