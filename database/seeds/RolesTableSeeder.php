<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'description' => 'Admin role description'
        ]);

        Role::create([
            'name' => 'Farmer',
            'description' => 'Farmer role description'
        ]);

        Role::create([
            'name' => 'Consultant',
            'description' => 'Consultant role description'
        ]);

        Role::create([
            'name' => 'Academic',
            'description' => 'Academic role description'
        ]);

        Role::create([
            'name' => 'Other',
            'description' => 'Other role description'
        ]);
    }
}
