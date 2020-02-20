<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'right' => 'create',
            'description' => 'can create data',
        ]);
        Permission::create([
            'right' => 'read',
            'description' => 'can read data',
        ]);
        Permission::create([
            'right' => 'update',
            'description' => 'can update data',
        ]);
        Permission::create([
            'right' => 'delete',
            'description' => 'can delete data',
        ]);
    }
}