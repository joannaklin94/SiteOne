<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->integer('prof_id')->unsigned();
            $table->integer('faculty_id')->unsigned();
            $table->integer('institute_id')->unsigned();
            $table->string('room');
            $table->text('visit_hours');
            $table->string('telephone');
            $table->timestamps();

            $table->unique(['telephone']);

            $table->foreign('prof_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('institute_id')->references('institute_id')->on('institutes');
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
        Schema::drop('professors');
    }
}
