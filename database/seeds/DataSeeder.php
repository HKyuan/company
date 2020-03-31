<?php

use App\Company;
use App\Member;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Company')->create();

        $company = Company::first();

        Product::create([
            'productName' => 'Bang',
            'description' => 'This is a product',
            'amount' => 20,
            'price' => 30,
            'company_id' => $company->id,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'User@user.com',
            'email_verified_at' => now(),
            'phone' => '0912-345-678',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $user = User::first();

        Member::create([
            'email' => 'Member@member.com',
            'name' => 'Member',
            'password' => Hash::make('password'),
            'phone' => '0912-345-678',
            'company_id' => $company->id,
        ]);

        factory('App\Role')->create();

        Order::create([
            'amount' => 10,
            'price' => 20,
            'paid' => false,
            'user_id' => $user->id,
        ]);
    }
}