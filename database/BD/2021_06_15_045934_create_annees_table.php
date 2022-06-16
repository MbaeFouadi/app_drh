<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annees', function (Blueprint $table) {
            $table->id();
            $table->string("annee");
            $table->timestamps();
        });


        /*Schema::create('annee_statut', function (Blueprint $table){
            $table->Increments('id');
            $table->unsignedInteger('annee_id');
            $table->unsignedInteger('statut_id');
            $table->foreign('annee_id')->references('id')->on('annees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('statut_id')->references('id')->on('statuts')->onUpdate('cascade')->onDelete('cascade');
        });*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('annee_statut');
        Schema::dropIfExists('annees');
    }
}
