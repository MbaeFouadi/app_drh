<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuts', function (Blueprint $table) {
            $table->id();
            $table->string("date_re");
            $table->string("date_dec");
            $table->string("note");
            $table->unsignedInteger("corps_id");
            $table->unsignedInteger("echelons_id");
            $table->unsignedInteger("classes_id");
            $table->unsignedInteger("indices_id");
            $table->string("ministere");
            $table->timestamps();
            $table->unsignedInteger('annee_id');
           // $table->foreign('annee_id')->references('id')->on('annees')/*->onUpdate('cascade')->onDelete('cascade')*/;
            // $table->unsignedInteger('classe_id');
           // $table->foreign('classe_id')->references('id')->on('classes')/*->onUpdate('cascade')->onDelete('cascade')*/;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuts');
    }
}
