<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('presidential_candidate_id')->unsigned();
            $table->foreign('presidential_candidate_id')
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
        Schema::dropIfExists('finance_candidates');
    }
}
