<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string("nin");
            $table->string("matricule");
            $table->string("nom");
            $table->string("prenom");
            $table->string("date_naissance");
            $table->string("lieu_naissance");
            $table->string("adresse");
            $table->string("telephone");
            $table->string("email");
            $table->string("sexe");
            $table->string("statut");
            $table->integer("nombre_enfant")->default(0);
            $table->string("naissance");
            $table->integer("nombre_charge")->default(0);
            $table->string("compte_bancaire");
            $table->unsignedInteger("statut_id");
            $table->integer("annee_id");
            $table->integer("position_id");
            $table->integer("type_contrat_id");
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("ide");
            $table->timestamps();
        });

        Schema::create('employer_formation', function (Blueprint $table){
            $table->Increments('id');
            $table->unsignedInteger('employer_id');
            $table->unsignedInteger('formation_id');
            $table->unsignedInteger("user_id");

            //$table->foreign('employer_id')->references('id')->on('employers')/*->onUpdate('cascade')->onDelete('cascade')*/;
           // $table->foreign('formation_id')->references('id')->on('formations')/*->onUpdate('cascade')->onDelete('cascade')*/;
        });

        Schema::create('avancement_employer', function (Blueprint $table){
            $table->Increments('id');
            $table->unsignedInteger('avancement_id');
            $table->unsignedInteger('employer_id');
            $table->unsignedInteger("user_id");

           // $table->foreign('avancement_id')->references('id')->on('avancements')/*->onUpdate('cascade')->onDelete('cascade')*/;
           // $table->foreign('employer_id')->references('id')->on('employers')/*->onUpdate('cascade')->onDelete('cascade')*/;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employer_formation');
        Schema::dropIfExists('avancement_employer');
        Schema::dropIfExists('employers');
    }
}
