<?php

use Illuminate\Database\Migrations\Migration;

class CreateGifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifs', function ($table) {
            $table->increments('id');

            $table->string('url');
            $table->string('thumb');

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
        Schema::drop('gifs');
    }

}
