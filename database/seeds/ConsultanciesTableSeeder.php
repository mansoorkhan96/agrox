<?php

use App\Consultancy;
use Illuminate\Database\Seeder;

class ConsultanciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Consultancy::class, 10)->create();
    }
}
