<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesCorpsEchelonsIndicesPeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes_corps_echelons_indices_periodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('classes_id');
            $table->unsignedInteger('corps_id');
            $table->unsignedInteger('echelons_id');
            $table->unsignedInteger('indices_id');
            $table->unsignedInteger('periodes_id');
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
        Schema::dropIfExists('classes_corps_echelons_indices_periodes');
    }
}
