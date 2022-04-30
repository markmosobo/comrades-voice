<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesCastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes_casts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_no')->nullable();
            $table->integer('school_male_rep_id')->unsigned();
            $table->foreign('school_male_rep_id')
            ->references('id')->on('students')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('school_female_rep_id')->unsigned();
            $table->foreign('school_female_rep_id')
            ->references('id')->on('students')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('president_id')->unsigned();
            $table->foreign('president_id')
            ->references('id')->on('students')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('finance_id')->unsigned();
            $table->foreign('finance_id')
            ->references('id')->on('students')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sports_id')->unsigned();
            $table->foreign('sports_id')
            ->references('id')->on('students')
            ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('votes_casts');
    }
}
