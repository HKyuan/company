<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'uniform' => $faker->numberBetween(10000000, 99999999),
        'companyName' => $faker->companySuffix,
        'phone' => $faker->phoneNumber,
    ];
});