<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->text('full_description');
            $table->unsignedBigInteger('video_id')->nullable();
            $table->unsignedBigInteger('trailer_id')->nullable();
            $table->integer('duration');
            $table->unsignedBigInteger('cover_id')->nullable();
            $table->timestamps();

            $table->foreign('cover_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
