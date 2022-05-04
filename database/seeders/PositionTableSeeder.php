<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'President',
            'position_code' => 'PRES',
            'slot' => '1'
        ]);

        Position::create([
            'name' => 'School Representative',
            'position_code' => 'REP',
            'slot' => '2'
        ]);

        Position::create([
            'name' => 'Secretary General',
            'position_code' => 'SEC-GEN',
            'slot' => '1'
        ]);

        Position::create([
            'name' => 'Finance',
            'position_code' => 'FINANCE',
            'slot' => '1'
        ]);

        Position::create([
            'name' => 'Sports Representative',
            'position_code' => 'SPORTS-REP',
            'slot' => '2'
        ]);

    }
}
