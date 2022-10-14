<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvancementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avancements', function (Blueprint $table) {
            $table->id();
            $table->string("date_avan");
            $table->string("date_dec");
            $table->string("note");
            $table->string("type");
            $table->string("type_av");
            $table->unsignedInteger("corps_id");
            $table->unsignedInteger("echelons_id");
            $table->unsignedInteger("classes_id");
            $table->unsignedInteger("indices_id");
            $table->unsignedInteger("user_id");
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
        Schema::dropIfExists('avancements');
    }
}
