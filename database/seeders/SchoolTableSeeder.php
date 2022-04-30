<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
Use App\Models\School;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'name' => 'School of Computing and Informatics',
            'school_code' => 'SCI'
        ]);

        School::create([
            'name' => 'School of Education',
            'school_code' => 'SOE'
        ]);

        School::create([
            'name' => 'School of Engineering and Built Environment',
            'school_code' => 'SEBE'
        ]);

        School::create([
            'name' => 'School of Business and Economics',
            'school_code' => 'SOBE'
        ]);

        School::create([
            'name' => 'School of Medicine',
            'school_code' => 'SOM'
        ]);

        School::create([
            'name' => 'School of Nursing, Midwifery and Paramedics',
            'school_code' => 'SON'
        ]);

        School::create([
            'name' => 'School of Natural Sciences',
            'school_code' => 'SONAS'
        ]);

        School::create([
            'name' => 'School of Arts and Social Sciences',
            'school_code' => 'SASS'
        ]);

        School::create([
            'name' => 'School of Agriculture, Veterinary Services and Technology',
            'school_code' => 'SOVET'
        ]);

        School::create([
            'name' => 'School of Disaster Management and Humanitarian Assistance',
            'school_code' => 'SODHA'
        ]);

    }
}
