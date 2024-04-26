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
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin@gmail.com'),
        ]);

        $user->roles()->sync([1,2,3,4,5]);
        $user->permissions()->sync([1,6,10]);


        // Create  a Admin

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com'),
        ]);

        $user->roles()->sync([2,3,4,5]);
        $user->permissions()->sync([1,6,10]);


        // Create a Stock Manager

        $user = User::create([
            'name' => 'Stock Manager',
            'email' => 'stockmanager@gmail.com',
            'password' => Hash::make('stockmanager@gmail.com'),
        ]);
        
        $user->roles()->sync([3,4,5]);
        $user->permissions()->sync([1,6,10]);
        

                
        // Create a Order Manager

        $user = User::create([
            'name' => 'Order Manager',
            'email' => 'ordermanager@gmail.com',
            'password' => Hash::make('ordermanager@gmail.com'),
        ]);

        $user->roles()->sync([4,5]);
        $user->permissions()->sync([1,6,10]);



        // Create a Commercial Manager

        $user = User::create([
            'name' => 'Customer Manager',
            'email' => 'comercialmanager@gmail.com',
            'password' => Hash::make('comercialmanager@gmail.com'),
        ]);

        $user->roles()->sync([5]);
        $user->permissions()->sync([1,6,10]);
    }
}
