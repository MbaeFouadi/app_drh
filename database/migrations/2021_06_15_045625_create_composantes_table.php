<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composantes', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("code_des");
            $table->timestamps();
            $table->unsignedInteger('annee_id');
           // $table->foreign('annee_id')->references('id')->on('annees')/*->onUpdate('cascade')->onDelete('cascade')*/;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('composantes');
    }
}
