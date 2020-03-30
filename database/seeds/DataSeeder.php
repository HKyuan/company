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
        factory('App\Member', 5)->create();
        factory('App\Role')->create();
    }
}