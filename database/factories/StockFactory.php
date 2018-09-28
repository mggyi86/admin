<?php

use App\Models\Stock;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use FakerRestaurant\Provider\en_US\Restaurant as RestaurantFaker;

$factory->define(Stock::class, function (Faker $faker) {
    $faker->addProvider(new RestaurantFaker($faker));
    $restaurantCount = Restaurant::count();

    return [
        'restaurant_id' => $faker->numberBetween($min = 1, $max = $restaurantCount),
        'name_en' => $faker->foodName,
        'name_mm' => $faker->beverageName,
        'uuid' => hexdec(uniqid()),
        'net_price' => $faker->numberBetween($min = 1000, $max = 9000),
        'discounted_price' => $faker->numberBetween($min = 1000, $max = 9000),
        'image' => $faker->image($dir = public_path('storage/stocks'), $width = 150, $height = 150, 'food', false)
    ];
});
