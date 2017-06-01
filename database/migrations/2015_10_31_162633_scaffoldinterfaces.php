<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Scaffoldinterfaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scaffoldinterfaces', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->String('package');
            $table->String('migration');
            $table->String('model');
            $table->String('controller');
            $table->String('views');
            $table->String('tablename');
            $table->timestamps();
        });
        Schema::create('relations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('scaffoldinterface_id')->unsigned();
            $table->String('to');
            $table->String('having');
            $table->foreign('scaffoldinterface_id')->references('id')->on('scaffoldinterfaces')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('relations');
        Schema::drop('scaffoldinterfaces');
    }
}
