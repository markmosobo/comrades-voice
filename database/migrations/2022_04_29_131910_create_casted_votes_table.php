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
            $table->integer('school_male_rep_id')->unsigned();
            $table->foreign('school_male_rep_id')
            ->references('id')->on('candidates');
            $table->integer('school_female_rep_id')->unsigned();
            $table->foreign('school_female_rep_id')
            ->references('id')->on('candidates');
            $table->integer('president_candidate_id')->unsigned();
            $table->foreign('president_candidate_id')
            ->references('id')->on('candidates');
            $table->integer('sec_gen_candidate_id')->unsigned();
            $table->foreign('sec_gen_candidate_id')
            ->references('id')->on('candidates');
            $table->integer('finance_candidate_id')->unsigned();
            $table->foreign('finance_candidate_id')
            ->references('id')->on('candidates');
            $table->integer('sports_candidate_id')->unsigned();
            $table->foreign('sports_candidate_id')
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
