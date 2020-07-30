<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\PriceHistory::class, function (Faker $faker) {
    return [
        'item_id' => $faker->numberBetween(1, 100),
        'price' => $faker->randomFloat(2, 0.1, 99),
        'created_at' => $faker->dateTimeBetween('-30 days', 'now')
    ];
});
