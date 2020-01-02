<?php

use App\ConsultantReview;
use Illuminate\Database\Seeder;

class ConsultancyReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ConsultantReview::class, 10)->create();
    }
}
