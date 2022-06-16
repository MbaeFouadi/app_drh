<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Conge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->date("date_debut");
            $table->integer("nombre_jour");
            $table->integer("jour");
            $table->integer("reponse");
            $table->integer("is_ok");
            $table->text("motif");
            $table->integer("id_epmloye");
            $table->year("annee");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
