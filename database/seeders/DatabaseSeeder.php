<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // $this->call([
        //     classe::class,
        //     corps::class,
        //     echelons::class,
        //     // indices::class,
        //     // produitSeeder::class,
        //     indicesSeeder::class,
        //     userSeeder::class,
        //     anneesSeeder::class
        // $this->call(LaratrustSeeder::class);
        // $this->call(TypeContratSeeder::class);
        // $this->call(ContratSeeder::class);
    //     $this->call([indicesSeeder::class,
    //     // anneesSeeder::class,
    //     // PeriodeSeeder::class
    // ]);

    $this->call(PeriodeSeeder::class);



        //]);
    }
}
