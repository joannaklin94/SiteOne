<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialisations', function (Blueprint $table) {
            $table->increments('specialisation_id');
            $table->string('name');
            $table->integer('faculty_id')->unsigned();

            $table->unique('name');

            $table->foreign('faculty_id')->references('faculty_id')->on('faculties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('specialisations');
    }
}
