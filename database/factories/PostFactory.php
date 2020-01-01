<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'title' => $faker->sentence(5),
        'excerpt' => $faker->text(100),
        'body' => $faker->text(200),
        'featured_image' => $faker->imageUrl(),
        'attachments' => $faker->imageUrl(),
        'slug' => $faker->slug(),
        'post_type' => $faker->randomElement(['discussion', 'post']),
        'tag' => $faker->randomElement(['success_story', 'farmer_experience']),
        'status' => $faker->randomElement(['DRAFT', 'PENDING', 'PUBLISHED']),
        
    ];
});
