<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Supplier::create([
                'name' => 'Supplier ' . $i,
                'email' => 'supplier' . $i . '@example.com',
                'phone' => '123456789' . $i,
                'address' => $i . ' Main Street',
                'status' => 'active',
                'country' => 'Country ' . $i,
                'city' => 'City ' . $i
            ]);
        }
    }
}
