<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return null
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('position')->unsigned()->default(1);
            $table->integer('page_id')->unsigned()->nullable();
            $table->integer('image_id')->unsigned()->nullable();
            $table->string('url')->nullable();
            $table->json('status');
            $table->json('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return null
     */
    public function down()
    {
        Schema::drop('slides');
    }
}
