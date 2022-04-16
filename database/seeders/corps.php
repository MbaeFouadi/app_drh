<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class corps extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('corps')->insert([
            'nom' => 'Ingénieurs',
        ]);

        DB::table('corps')->insert([
            'nom' => 'Administrateurs',
        ]);

        DB::table('corps')->insert([
            'nom' => 'Techninicien',
        ]);

        DB::table('corps')->insert([
            'nom' => 'Agent titulaire',
        ]);

        DB::table('corps')->insert([
            'nom' => 'Administrateurs adjoint',
        ]);

        DB::table('corps')->insert([
            'nom' => 'Techniciens',
        ]);

        DB::table('corps')->insert([
            'nom' => 'Ouvrier spécialisés',
        ]);
    }

    // public function run()
    // {
    //     DB::table('corps')->insert([
    //         'nom' => 'corps administrateur',
    //     ]);
    // }
}
