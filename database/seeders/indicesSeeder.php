<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class indicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // $faker=Faker::create();

        // foreach(range(1,10) as $value)
        // {
        //     DB::table('indices')->insert([
        //         'nom'=>$faker->numberBetween(400,3000),

        //     ]);
        // }

        for($i=400;$i<=4000;$i++)
        {
            DB::table('indices')->insert([
                'nom'=>$i,

            ]);
        }
    }
}
