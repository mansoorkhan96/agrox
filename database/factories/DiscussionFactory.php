<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Discussion;
use Faker\Generator as Faker;

$factory->define(Discussion::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(2, 10),
        'post_id' => $faker->numberBetween(1, 10),
        'discussion' => $faker->text(200)
    ];
});
