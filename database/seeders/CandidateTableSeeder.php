<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::create([
            'student_id' => '1',
            'position_id' => '1',
            'school_id' => '1',
            'gender' => 'M',
            'acad_year' => '2021/2022'
        ]);

        Candidate::create([
            'student_id' => '2',
            'position_id' => '2',
            'school_id' => '3',
            'gender' => 'F',
            'acad_year' => '2021/2022'
        ]);

        Candidate::create([
            'student_id' => '6',
            'position_id' => '3',
            'school_id' => '5',
            'gender' => 'M',
            'acad_year' => '2021/2022'
        ]);

        Candidate::create([
            'student_id' => '9',
            'position_id' => '4',
            'school_id' => '5',
            'gender' => 'M',
            'acad_year' => '2021/2022'
        ]);

        Candidate::create([
            'student_id' => '11',
            'position_id' => '5',
            'school_id' => '1',
            'gender' => 'F',
            'acad_year' => '2021/2022'
        ]);
    }
}
