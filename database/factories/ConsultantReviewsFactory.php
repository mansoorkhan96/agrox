<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ConsultantReview;
use Faker\Generator as Faker;

$factory->define(ConsultantReview::class, function (Faker $faker) {
    return [
        'consultant' => $faker->numberBetween(2, 10),
        'consumer' => $faker->numberBetween(2, 10),
        'rating' => $faker->numberBetween(1, 5),
        'review' => $faker->text(200)
    ];
});
