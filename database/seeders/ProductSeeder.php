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

        // Generate fake products
        // for ($i = 0; $i < 2; $i++) {
        //     Product::create([
        //         'name' => $faker->word . ' ' . $faker->randomElement(['Nike', 'Adidas', 'Puma', 'Reebok']),
        //         'description' => $faker->sentence,
        //         'price' => $faker->randomFloat(2, 500, 5000),
        //         'image' => 'https://via.placeholder.com/300x200', // Placeholder image
        //         'is_bestseller' => true,
        //     ]);
        // }

        // Insert multiple products at once
        Product::insert([
            [
                'name' => 'Nike Air Max 90',
                'description' => 'Men\'s Shoe',
                'price' => 1200000,
                'image' => 'https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cb996185fb0.png',
                'is_bestseller' => true,
            ],
            [
                'name' => 'Nike Air Force 1',
                'description' => 'Men\'s Shoe',
                'price' => 1000000,
                'image' => 'https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cc05a68c8c2.png',
                'is_bestseller' => true,
            ],
            [
                'name' => 'Nike Dunk Low Retro SE',
                'description'=> 'Men\'s Shoe',
                'price' => 2000000,
                'image' => 'https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cc0ea067ba5.png',
                'is_bestseller' => true,
            ],
            [
                'name' => 'Nike Dunk Low Retro - Pale Ivory Glacier Blue ',
                'description' => 'Men\'s Shoe',
                'price' => 1900000,
                'image' => 'https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cc0f98bc912.png',
                'is_bestseller' => true,
            ],
            [
                'name' => 'Nike Air Force 1 \'07 LV8',
                'description'=> 'Men\'s Shoe',
                'price' => 2000000,
                'image' => 'https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cc0f1aa3f72.png',
                'is_bestseller' => true,
            ],
            [
                'name' => 'Nike Air Max 270',
                'description' => 'Men\'s Shoe',
                'price' => 2500000,
                'image' => 'https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cc15509a9dd.jpeg',
                'is_bestseller' => true,
            ],
            [
                'name' => 'Black Nike Metcon 9',
                'description' => 'Men\'s Shoe',
                'price' => 1500000,
                'image' => 'https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cc15cd4ca95.png',
                'is_bestseller' => true,
            ],
            [
                'name' => 'White Nike Air Max SC',
                'description' => 'Men\'s Shoe',
                'price' => 1800000,
                'image' => 'https://storage.googleapis.com/nookdb-4781f.appspot.com/sneaker_head_uploads/67cc16245c2c9.png',
                'is_bestseller' => true,
            ]
                
        ]);
    }
}
