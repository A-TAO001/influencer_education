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
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->longText('description');
            $table->mediumText('video_url');
            $table->tinyInteger('alway_delivery_flg')->nullable();
            $table->unsignedBigInteger('classes_id');
            $table->timestamps();
            
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
