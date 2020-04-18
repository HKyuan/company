<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $company = Company::first();
    return [
        'productName' => $faker->name,
        'description' => str_random(20),
        'amount' => random_int(10, 50),
        'price' => random_int(10, 50),
        'company_id' => $company->id,
    ];
});