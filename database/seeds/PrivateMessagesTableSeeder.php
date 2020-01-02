<?php

use App\PrivateMessage;
use Illuminate\Database\Seeder;

class PrivateMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PrivateMessage::class, 20)->create();
    }
}
