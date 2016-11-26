<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('avatar')->default('default.png');
            $table->string('role');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

//            $table->primary(['id', 'email']); //dopisane

//            $table->foreign('id')->references('student_id')->on('students')->onDelete('cascade');
//           $table->foreign('id')->references('prof_id')->on('profs')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('users', function ($table) {
//            $table->dropPrimary('id');
//            $table->dropForeign('id');
//        });

        Schema::drop('users');
    }
}
