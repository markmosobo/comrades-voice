<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sport_candidate_id')->unsigned();
            $table->foreign('sport_candidate_id')
            ->references('id')->on('students')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('gender')->nullable();
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
        Schema::dropIfExists('sport_candidates');
    }
}
