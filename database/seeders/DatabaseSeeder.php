<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(TaxSeeder::class);
        $this->call(SupplierSeeder::class);
        // $this->call(ProductSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
