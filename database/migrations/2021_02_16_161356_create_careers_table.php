<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('FisrtName');
            $table->string('LastName');
            $table->string('Email');
            $table->string('Cv');
            $table->string('Description');
            $table->unsignedInteger('PositionId');
            $table->foreign('PositionId')->references('IdPosition')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('careers');
    }
}
