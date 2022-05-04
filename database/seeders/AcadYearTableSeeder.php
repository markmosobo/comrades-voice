<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcadYear;

class AcadYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcadYear::create([
            'year_code' => '2021/2022'
        ]);
    }
}
