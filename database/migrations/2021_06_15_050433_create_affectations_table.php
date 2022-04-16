<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->id();
            $table->string("numero_post");
            $table->string("position");
            $table->timestamps();
            $table->unsignedInteger('composante_id');
            $table->unsignedInteger('affectation_id');
            $table->unsignedInteger('fonction_id');
            //$table->foreign('fonction_id')->references('id')->on('fonctions')/*->onUpdate('cascade')->onDelete('cascade')*/;
            $table->unsignedInteger('employer_id');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('affectations');
    }
}
