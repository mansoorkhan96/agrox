<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PrivateMessage;
use Faker\Generator as Faker;

$factory->define(PrivateMessage::class, function (Faker $faker) {
    return [
        'consultancy_id' => $faker->numberBetween(1, 10),
        'consultant' => $faker->numberBetween(2, 10),
        'consumer' => $faker->numberBetween(2, 10),
        'message' => $faker->sentence(10)
    ];
});
