<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consultancy;
use Faker\Generator as Faker;

$factory->define(Consultancy::class, function (Faker $faker) {
    return [
        'consultant' => $faker->numberBetween(2, 10),
        'consumer' => $faker->numberBetween(2, 10),
        'category_id' => $faker->numberBetween(1, 10),
        'title' => $faker->sentence(6),
        'description' => $faker->sentence(20)
    ];
});
