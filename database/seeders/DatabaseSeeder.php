<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $this->call(ProductSeeder::class);
        $this->call(CustomerSeeder::class);

        // Create a Super Admin
        $user = User::create([
            'name' => 'Mohammed Miessal',
            'email' => 'mohammedmiessal@gmail.com',
            'password' => Hash::make('mohammedmiessal@gmail.com'),
        ]);

        $user->roles()->sync([1]);
        $user->permissions()->sync([1,6,10]);

    }
}
