<?php

/** @var Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'price' => $faker->randomFloat(2, 10, 30),
        'heading' => $faker->word,
        'description' => $faker->paragraph(2, true)
    ];
});
