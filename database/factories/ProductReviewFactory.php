<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductReview;
use Faker\Generator as Faker;

$factory->define(ProductReview::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1, 10),
        'user_id' => $faker->numberBetween(2, 10),
        'rating' => $faker->numberBetween(1, 5),
        'review' => $faker->text(200)
    ];
});
