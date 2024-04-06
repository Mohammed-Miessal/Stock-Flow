<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Category::create([
                'name' => "Category $i",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
      
     
    
    }
}
