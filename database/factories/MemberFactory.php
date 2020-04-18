<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    $company = Company::first();
    return [
        'email' => $faker->email,
        'name' => $faker->userName,
        'password' => Hash::make('password'),
        'phone' => $faker->phoneNumber,
        'company_id' => $company->id,
        'remember_token' => Str::random(10),
    ];
});