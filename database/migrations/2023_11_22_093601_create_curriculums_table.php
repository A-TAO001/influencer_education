<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculums', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->string('title',255)->nullable();
            $table->string('thumbnail',255);
            $table->longText('description');
            $table->mediumtext('video_url');
            $table->tinyInteger('alway_delivery_flg',4)->nullable();
            $table->integer('classes_id',10)->nullable()->unsigned();
            $table->timestamps()->nullable();
            $table->foreign('classes_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculums');
    }
};
