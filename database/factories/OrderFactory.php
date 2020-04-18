<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $user = User::first();
    return [
        'amount' => random_int(100, 300),
        'price' => random_int(500, 900),
        'paid' => false,
        'user_id' => $user->id,
    ];
});