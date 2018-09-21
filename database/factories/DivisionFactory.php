<?php

use App\Models\Division;
use Faker\Generator as Faker;

$factory->define(Division::class, function (Faker $faker) {
    $city = $faker->city;

    return [
        'name' =>  $city,
        'slug' => str_slug($city)
    ];
});
