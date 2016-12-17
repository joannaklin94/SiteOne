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
            $table->integer('student_id')->unsigned();
            $table->integer('student_number');
            $table->integer('faculty_id')->unsigned();
            $table->integer('specialisation_id')->unsigned();
            $table->string('degree');
            $table->integer('thesis_id')->nullable()->default(null);
            $table->string('telephone');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->unique(['student_number','telephone']);
            $table->primary('student_id');

            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('specialisation_id')->references('specialisation_id')->on('specialisations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
