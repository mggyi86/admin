<?php

use App\Models\Township;
use Faker\Generator as Faker;

$factory->define(Township::class, function (Faker $faker) {
    $city = $faker->city;

    return [
        'name' =>  $city,
        'slug' => str_slug($city),
        'division_id' => $faker->numberBetween($min = 1, $max = 15)
    ];
});
