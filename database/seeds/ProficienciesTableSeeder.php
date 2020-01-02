<?php

use App\Proficiency;
use Illuminate\Database\Seeder;

class ProficienciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proficiency::create([
            'proficiency' => 'Expert',
            'description' => 'You are known as an expert in this area. You can provide guidance, troubleshoot and answer questions related to this area of expertise and the field where the skill is used.'
        ]);

        Proficiency::create([
            'proficiency' => 'Advanced',
            'description' => 'You can perform the actions associated with this skill without assistance. You are certainly recognized within your immediate organization as "a person to ask" when difficult questions arise regarding this skill.'
        ]);

        Proficiency::create([
            'proficiency' => 'Intermediate',
            'description' => 'You are able to successfully complete tasks in this competency as requested. Help from an expert may be required from time to time, but you can usually perform the skill independently.'
        ]);

        Proficiency::create([
            'proficiency' => 'Novice',
            'description' => 'You have the level of experience gained in a classroom and/or experimental scenarios or as a trainee on-the-job. You are expected to need help when performing this skill.'
        ]);

        Proficiency::create([
            'proficiency' => 'Not Applicable',
            'description' => 'You have a common knowledge or an understanding of basic techniques and concepts.'
        ]);
    }
}
