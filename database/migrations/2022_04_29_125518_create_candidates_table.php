<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')  
            ->references('id')
            ->on('positions');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')  
            ->references('id')
            ->on('students');
            $table->integer('school_id')->unsigned();
            $table->foreign('school_id')
            ->references('id')->on('schools');
            $table->string('gender')->nullable();
            $table->string('acad_year')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
