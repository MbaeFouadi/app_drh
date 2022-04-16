<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class anneesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('annees')->insert([
            'annee' => '2020',
        ]);

        DB::table('annees')->insert([
            'annee' => '2019',
        ]);

        DB::table('annees')->insert([
            'annee' => '2018',
        ]);

        DB::table('annees')->insert([
            'annee' => '2017',
        ]);

        DB::table('annees')->insert([
            'annee' => '2016',
        ]);

        DB::table('annees')->insert([
            'annee' => '2015',
        ]);

        DB::table('annees')->insert([
            'annee' => '2014',
        ]);




    }
}
