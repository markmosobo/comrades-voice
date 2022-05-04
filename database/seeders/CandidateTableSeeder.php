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
        //presidential
        Candidate::create([
            'student_id' => '1',
            'position_id' => '1',
            'school_id' => '1',
            'gender' => 'M',
            'acad_year_id' => '1'
        ]);

        Candidate::create([
            'student_id' => '16',
            'position_id' => '1',
            'school_id' => '8',
            'gender' => 'F',
            'acad_year_id' => '1'
        ]);

        Candidate::create([
            'student_id' => '10',
            'position_id' => '1',
            'school_id' => '3',
            'gender' => 'M',
            'acad_year_id' => '1'
        ]);

        //School Reps
        Candidate::create([
            'student_id' => '2',
            'position_id' => '2',
            'school_id' => '3',
            'gender' => 'F',
            'acad_year_id' => '1'
        ]);

        Candidate::create([
            'student_id' => '20',
            'position_id' => '2',
            'school_id' => '7',
            'gender' => 'F',
            'acad_year_id' => '1'
        ]);
        
        Candidate::create([
            'student_id' => '19',
            'position_id' => '2',
            'school_id' => '3',
            'gender' => 'M',
            'acad_year_id' => '1'
        ]);
        
        Candidate::create([
            'student_id' => '18',
            'position_id' => '2',
            'school_id' => '10',
            'gender' => 'M',
            'acad_year_id' => '1'
        ]);  
        
        //sec-gens
        Candidate::create([
            'student_id' => '6',
            'position_id' => '3',
            'school_id' => '5',
            'gender' => 'M',
            'acad_year_id' => '1'
        ]);

        Candidate::create([
            'student_id' => '8',
            'position_id' => '3',
            'school_id' => '2',
            'gender' => 'F',
            'acad_year_id' => '1'
        ]);
        
        Candidate::create([
            'student_id' => '14',
            'position_id' => '3',
            'school_id' => '6',
            'gender' => 'M',
            'acad_year_id' => '1'
        ]); 

        //finance
        Candidate::create([
            'student_id' => '15',
            'position_id' => '4',
            'school_id' => '5',
            'gender' => 'F',
            'acad_year_id' => '1'
        ]);

        Candidate::create([
            'student_id' => '13',
            'position_id' => '4',
            'school_id' => '1',
            'gender' => 'F',
            'acad_year_id' => '1'
        ]);
        
        Candidate::create([
            'student_id' => '17',
            'position_id' => '4',
            'school_id' => '3',
            'gender' => 'M',
            'acad_year_id' => '1'
        ]); 

        //sports and co-curriculra reps
        Candidate::create([
            'student_id' => '15',
            'position_id' => '5',
            'school_id' => '4',
            'gender' => 'M',
            'acad_year_id' => '1'
        ]);

        Candidate::create([
            'student_id' => '11',
            'position_id' => '5',
            'school_id' => '1',
            'gender' => 'M',
            'acad_year_id' => '1'
        ]);

        Candidate::create([
            'student_id' => '4',
            'position_id' => '5',
            'school_id' => '4',
            'gender' => 'F',
            'acad_year_id' => '1'
        ]);

        Candidate::create([
            'student_id' => '2',
            'position_id' => '5',
            'school_id' => '1',
            'gender' => 'F',
            'acad_year_id' => '1'
        ]);        
    }
}
