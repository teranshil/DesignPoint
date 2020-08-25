<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\ProductUser;
use Faker\Generator as Faker;

$factory->define(ProductUser::class, function (Faker $faker) {
    return [
        'product_id' => factory(\App\Product::class)->create()->getAttribute('id'),
        'user_id' => factory(User::class)->create()->getAttribute('id')
//
    ];
});
