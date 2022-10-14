<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFonctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonctions', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("corps");
            $table->string("nombre");
            $table->timestamps();
            $table->unsignedInteger('service_id');
           // $table->foreign('service_id')->references('id')->on('services')/*->onUpdate('cascade')->onDelete('cascade')*/;
            $table->unsignedInteger('category_id');
           // $table->foreign('category_id')->references('id')->on('categories')/*->onUpdate('cascade')->onDelete('cascade')*/;
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
        Schema::dropIfExists('fonctions');
    }
}
