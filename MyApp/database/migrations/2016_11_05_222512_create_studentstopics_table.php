<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentstopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentstopics', function (Blueprint $table) {
            $table->integer('id_student')->unsigned();
            $table->integer('id_thesis')->unsigned();
            $table->timestamps();

            $table->unique(['id_student', 'id_thesis']);

//            $table->foreign('id_thesis')->references('id')->on('theses');
            $table->foreign('id_student')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('studentstopics');
    }
}
