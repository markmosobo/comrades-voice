<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ElectionDate;

class ElectionDateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ElectionDate::create([
            'acad_year_id' => '',
            'start_date' => '',
            'start_time' => '',
            'end_date' => '',
            'end_time' => ''
        ]);
    }
}
