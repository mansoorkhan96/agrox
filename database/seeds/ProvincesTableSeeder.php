<?php

use App\Province;
use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
            'country_id' => 168,
            'name' => 'Sindh',
        ]);

        Province::create([
            'country_id' => 168,
            'name' => 'Balochistan',
        ]);

        Province::create([
            'country_id' => 168,
            'name' => 'Punjab',
        ]);

        Province::create([
            'country_id' => 168,
            'name' => 'Khayber Pakhtunkhwa',
        ]);

        Province::create([
            'country_id' => 168,
            'name' => 'Gilgit–Baltistan',
        ]);

        Province::create([
            'country_id' => 168,
            'name' => 'Azad Kashmir',
        ]);
    }
}
