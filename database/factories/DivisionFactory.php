<?php

use App\Models\Division;
use Faker\Generator as Faker;

$factory->define(Division::class, function (Faker $faker) {
    $name = $faker->name;

    return [
        'name' =>  $name,
        'slug' => str_slug($name)
    ];
});
