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
            'periode' => "2003-2004",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2004-2005",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2005-2006",
        ]);
        DB::table('periodes')->insert([
            'periode' => "2006-2007",
        ]);
        DB::table('periodes')->insert([
            'periode' => "2007-2008",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2008-2009",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2009-2010",
        ]);
        DB::table('periodes')->insert([
            'periode' => "2010-2011",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2011-2012",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2012-2013",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2013-2014",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2014-2015",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2016-2017",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2017-2018",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2018-2019",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2019-2020",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2020-2021",
        ]);


        DB::table('periodes')->insert([
            'periode' => "2021-2022",
        ]);

        DB::table('periodes')->insert([
            'periode' => "2022-2023",
        ]);
    }
}
