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
           $table->string('title_pol')->unique();
           $table->string('title_ang')->unique()->nullable()->default(null);
           $table->string('description_pol')->nullable();
           $table->string('description_ang')->nullable()->default(null);
           $table->string('degree');
           $table->integer('faculties');
           $table->string('specialisations');
           $table->string('is_chosen')->default('not_chosen');
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
