<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastedVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casted_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('male_sch_candidate_id')->unsigned();
            $table->foreign('male_sch_candidate_id')
            ->references('id')->on('candidates');
            $table->integer('female_sch_candidate_id')->unsigned();
            $table->foreign('female_sch_candidate_id')
            ->references('id')->on('candidates');
            $table->integer('pres_candidate_id')->unsigned();
            $table->foreign('pres_candidate_id')
            ->references('id')->on('candidates');
            $table->integer('sec_gen_candidate_id')->unsigned();
            $table->foreign('sec_gen_candidate_id')
            ->references('id')->on('candidates');
            $table->integer('fin_candidate_id')->unsigned();
            $table->foreign('fin_candidate_id')
            ->references('id')->on('candidates');
            $table->integer('male_sport_candidate_id')->unsigned();
            $table->foreign('male_sport_candidate_id')
            ->references('id')->on('candidates');
            $table->integer('female_sport_candidate_id')->unsigned();
            $table->foreign('female_sport_candidate_id')
            ->references('id')->on('candidates');            
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
        Schema::dropIfExists('casted_votes');
    }
}
