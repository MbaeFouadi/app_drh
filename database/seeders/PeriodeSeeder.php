<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('periodes')->insert([
            'periode' => 2008,
        ]);

        DB::table('periodes')->insert([
            'periode' => 2011,
        ]);
    }
}
