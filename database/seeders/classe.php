<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class classe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('classes')->insert([
            'nom' => '1ère',
        ]);

        DB::table('classes')->insert([
            'nom' => '2ème',
        ]);

        DB::table('classes')->insert([
            'nom' => 'Technicien',
        ]);

        DB::table('classes')->insert([
            'nom' => 'Ouvrier spécialisé',
        ]);

        DB::table('classes')->insert([
            'nom' => 'Exceptionnelle',
        ]);

        DB::table('classes')->insert([
            'nom' => 'Stagiaire',
        ]);

    }
}
