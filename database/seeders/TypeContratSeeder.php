<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeContratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type_contrats')->insert([
            'code_design_contrat' => 'CDD',
            'design_contrat' => 'CONTRAT DE TRAVAIL A DUREE DETERMINEE',

        ]);

        DB::table('type_contrats')->insert([
            'code_design_contrat' => 'CDI',
            'design_contrat' => 'CONTRAT DE TRAVAIL A DUREE INDETERMINEE',

        ]);


        DB::table('type_contrats')->insert([
            'code_design_contrat' => 'CTV',
            'design_contrat' => 'CONTRAT DE TRAVAIL A TITRE DE VACATION',

        ]);
    }
}
