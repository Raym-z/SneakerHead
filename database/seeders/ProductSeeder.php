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

        // create manual products
        Product::create([
            'name' => 'Nike Air Max 90',
            'description' => 'The Nike Air Max 90 stays true to its OG roots with its iconic Waffle outsole, stitched overlays and classic, color-accented TPU plates. Retro colors celebrate the first generation while Max Air cushioning adds comfort to your journey.',
            'price' => 1200000,
            'image' => 'https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cb996185fb0.png',
            'is_bestseller' => false,
        ]);
    }
}
