<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Show All Posts',
            'controller' => 'PostController',
            'method' => 'index'
        ]);

        Permission::create([
            'name' => 'Edit Posts',
            'controller' => 'PostController',
            'method' => 'edit'
        ]);

        Permission::create([
            'name' => 'Delete Post',
            'controller' => 'PostController',
            'method' => 'destroy'
        ]);

        Permission::create([
            'name' => 'Show Single Post',
            'controller' => 'PostController',
            'method' => 'show'
        ]);
    }
}
