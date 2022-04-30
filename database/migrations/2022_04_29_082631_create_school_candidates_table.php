<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_candidate_id')->unsigned();
            $table->foreign('school_candidate_id')
            ->references('id')->on('students')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('school_id')->unsigned();
            $table->foreign('school_id')
            ->references('id')->on('schools')
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
        Schema::dropIfExists('school_candidates');
    }
}
