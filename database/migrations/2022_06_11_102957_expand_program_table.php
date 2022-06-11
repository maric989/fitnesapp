<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExpandProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->unsignedBigInteger('difficulty_id')->after('cover_id');
            $table->unsignedBigInteger('focus_id')->after('difficulty_id');
            $table->unsignedBigInteger('intensity_id')->after('focus_id');

            $table->foreign('difficulty_id')->references('id')->on('difficulties');
            $table->foreign('focus_id')->references('id')->on('focuses');
            $table->foreign('intensity_id')->references('id')->on('intensities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            //
        });
    }
}
