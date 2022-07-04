<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_id');
            $table->text('short_description')->nullable();
            $table->text('full_description');
            $table->unsignedBigInteger('cover_image_id')->nullable();
            $table->unsignedBigInteger('intensity_id');
            $table->unsignedBigInteger('difficulty_id');
            $table->timestamps();

            $table->foreign('intensity_id')->references('id')->on('intensities');
            $table->foreign('difficulty_id')->references('id')->on('difficulties');
            $table->foreign('cover_image_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
