<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\WarehouseItem::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'EAN' => $faker->ean13,
        'type' => $faker->numberBetween(0, 9),
        'weight' => $faker->randomFloat(2, 0.2, 9.9),
        'color' => $faker->colorName,
        'active' => 1,
        'quantity' => $faker->numberBetween(0, 100),
        'price' => $faker->randomFloat(2, 0.01, 99.99)
    ];
});
