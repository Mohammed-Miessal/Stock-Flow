<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'image' => $faker->imageUrl(),
                'name' => 'Product '.$i+1,
                'reference' => $faker->unique()->uuid,
                'quantity' => $faker->numberBetween(1, 100),
                'price' => $faker->randomFloat(2, 1, 1000),
                'status' => $faker->randomElement(['active', 'out of stock', 'archived', 'on pre-order']),
                'critical_stock' => $faker->numberBetween(0, 50),
                'category_id' => $faker->numberBetween(1, 10), // Adjust based on your category IDs
                'unit_id' => $faker->numberBetween(1, 5), // Adjust based on your unit IDs
                'tax_id' => $faker->numberBetween(1, 5), // Adjust based on your tax IDs
                'supplier_id' => $faker->numberBetween(1, 10), // Adjust based on your supplier IDs
                'subcategory_id' => $faker->numberBetween(1, 10) // Adjust based on your subcategory IDs
            ]);
        }
    }
}
