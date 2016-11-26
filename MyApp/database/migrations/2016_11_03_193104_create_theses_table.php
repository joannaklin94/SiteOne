<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('theses', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('id_prof')->unsigned();
           $table->string('title')->unique();
           $table->string('description')->nullable();
           $table->string('degree');
           $table->string('specialisations');
           $table->string('status')->default('not_chosen');
           //$table->rememberToken();
           $table->timestamps();


           $table->foreign('id_prof')->references('id')->on('users')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('theses');
    }
}
