<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'first_name' => 'Jakes',
            'last_name' => 'Okanya',
            'reg_no' => 'SIT/B-01/56390/2020',
            'school_id' => '1'
        ]);
    }
}
