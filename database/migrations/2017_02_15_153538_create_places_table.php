<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function(Blueprint $table){
            $table->increments('id');
            $table->text('name');
            $table->text('password');
            $table->text('address');
            $table->integer('idtown');
            $table->text('lat');
            $table->text('lon');
            $table->text('website');
            $table->text('description');
            $table->string('cel1');
            $table->string('cel2');
            $table->string('email')->unique();
            $table->text('photo');
            $table->integer('status');
            $table->timestamps();

           // $table->foreign('idtown')->references('id')->on('towns');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
