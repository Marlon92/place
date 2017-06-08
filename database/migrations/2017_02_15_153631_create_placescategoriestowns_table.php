<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacescategoriestownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placescategoriestowns', function(Blueprint $table){
            $table->increments('id');
            $table->integer('idplace')->unsigned();
            $table->integer('idcategory')->unsigned();
            $table->timestamps();

            $table->foreign('idplace')->references('id')->on('places');
            $table->foreign('idcategory')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placescategoriestowns');
    }
}
