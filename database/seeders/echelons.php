<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class echelons extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('echelons')->insert([
            'nom' => '1ère',
        ]);

        DB::table('echelons')->insert([
            'nom' => '2ème',
        ]);

        DB::table('echelons')->insert([
            'nom' => '3ème',
        ]);

        DB::table('echelons')->insert([
            'nom' => '4ème',
        ]);


    }
}
