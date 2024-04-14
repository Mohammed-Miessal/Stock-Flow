<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Customer::create([
                'name' => $faker->unique()->name,
                'email' => $faker->unique()->email,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'country' => $faker->unique()->country,
                'city' => $faker->unique()->city,
            ]);
        }
    }
}
