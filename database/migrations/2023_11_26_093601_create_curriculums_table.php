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
            $table->bigIncrements('id');
            $table->string('title', 255)->notNullable();
            $table->string('thumbnail', 255)->notNullable();
            $table->longText('description')->notNullable();
            $table->mediumText('video_url')->notNullable();
            $table->tinyInteger('alway_delivery_flg')->notNullable();
            $table->bigInteger('classes_id')->unsigned()->notNullable();
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
