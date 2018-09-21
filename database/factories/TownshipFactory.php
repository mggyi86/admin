<?php

use App\Models\Township;
use Faker\Generator as Faker;

$factory->define(Township::class, function (Faker $faker) {
    $name = $faker->name;

    return [
        'name' =>  $name,
        'slug' => str_slug($name),
        'division_id' => $faker->numberBetween($min = 1, $max = 15)
    ];
});
