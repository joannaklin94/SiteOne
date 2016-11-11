<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id')->unsigned();  //raczej int ale unique chyba niestarcza
            $table->integer('student_number');
            $table->string('specialisation');
            $table->string('degree');
            $table->string('tel');
//           $table->number('year');
            $table->boolean('status');  //nie wiem czy zosatwics
            //$table->rememberToken();
            $table->timestamps();


           $table->unique(['id', 'student_number','tel']);

//           $table->primary('student_id');
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('students', function ($table) {
//            $table->dropPrimary('student_id');
//            $table->dropForeign('student_id');
//        });

        Schema::drop('students');
    }
}
