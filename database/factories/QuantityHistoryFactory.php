<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\QuantityHistory::class, function (Faker $faker) {
    return [
        'item_id' => $faker->numberBetween(1, 99),
        'quantity' => $faker->numberBetween(0, 200)
    ];
});
