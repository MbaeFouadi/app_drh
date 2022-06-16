<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("code_des");
            $table->timestamps();
            $table->unsignedInteger('composante_id');
           // $table->foreign('composante_id')->references('id')->on('composantes')/*->onUpdate('cascade')->onDelete('cascade')*/;

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
