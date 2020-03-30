<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'name' => $faker->userName,
        'password' => Hash::make('password'),
        'phone' => $faker->phoneNumber,
        'company_id' => 1,
    ];
});