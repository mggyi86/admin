<?php

use App\Models\User;
use App\Models\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    $userCount = User::role('merchant')->count();
    $name = $faker->unique()->catchPhrase;

    return [
        'user_id' => $faker->numberBetween($min = 1, $max = $userCount),
        'name' => $name,
        'slug' => str_slug($name),
        'contact_name' => $faker->name,
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'description' => $faker->text,
        'service_charges(%)' => $faker->randomFloat,
        'packagings(per item)' => $faker->randomFloat,
        'opening_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'closing_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'image' => $faker->image($dir = public_path('storage/restaurants'), $width = 150, $height = 150, 'food', false),
    ];
});
