<?php

use Illuminate\Database\Seeder;

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
        factory('App\Member')->create();
        factory('App\User')->create();
        factory('App\Role')->create();
        factory('App\Order')->create();
        factory('App\Product')->create();
    }
}