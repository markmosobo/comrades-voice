<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(SchoolTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(AcadYearTableSeeder::class);
        $this->call(CandidateTableSeeder::class);
        // $this->call(ElectionDateTableSeeder::class);
    }
}
