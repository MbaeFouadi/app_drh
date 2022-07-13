<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratContenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat_contenu', function (Blueprint $table) {
            $table->id();
            $table->string("engagement")->nullable();
            $table->string("Duree")->nullable();
            $table->date("date_debut")->nullable();
            $table->date("date_fin")->nullable();
            $table->string("année_academique")->nullable();
            $table->string("semestre")->nullable();
            $table->string("mission")->nullable();
            $table->string("duree_volume")->nullable();
            $table->string("affectation")->nullable();
            $table->string("renumeration")->nullable();
            $table->string("conduite")->nullable()  ;
            $table->integer("employers_id")->nullable();
            $table->integer("type_contrat_id")->nullable();
            $table->integer("contrat_id")->nullable();
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
        Schema::dropIfExists('contrat_contenu');
    }
}
