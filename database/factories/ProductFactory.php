<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'name' => $faker->sentence,
        'slug' => $faker->slug,
        'featured' => false,
        'details' => $faker->sentence(8),
        'price' => $faker->numberBetween(1000, 500000),
        'description' => $faker->paragraph,
        'featured_image' => 'products/dummy/laptop-1.jpg',
        'images' => '["products\/dummy\/laptop-2.jpg","products\/dummy\/laptop-3.jpg","products\/dummy\/laptop-4.jpg"]',
        'quantity' => 10,
        'status' => $faker->randomElement(['PUBLISHED', 'DRAFT', 'PENDING']),
    ];
});
