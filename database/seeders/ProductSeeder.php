<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->word . ' ' . $faker->randomElement(['Nike', 'Adidas', 'Puma', 'Reebok']),
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 500, 5000),
                'image' => 'https://via.placeholder.com/300x200', // Replace with actual images later
                'is_bestseller' => true,
            ]);
        }
    }
}
