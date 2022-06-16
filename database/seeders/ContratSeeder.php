<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('contrats')->insert([
            'type' => 'NORMAL',
        ]);

        DB::table('contrats')->insert([
            'type' => 'CORPS ENSEIGNANT',
        ]);


        DB::table('contrats')->insert([
            'type' => 'VACATION',
        ]);

        DB::table('contrats')->insert([
            'type' => 'FORFAITAIRE',
        ]);

        DB::table('contrats')->insert([
            'type' => 'SECURITE',
        ]); 

        DB::table('contrats')->insert([
            'type' => 'FEMMME DE MENAGE',
        ]);
    }
}
