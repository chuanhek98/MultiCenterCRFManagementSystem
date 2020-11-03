<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSP4IQ48STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SP4_IQ48s', function (Blueprint $table) {
            $table->increments('SP4_IQ48_ID');
            //date and time for interim questionnaire
            $table->date('dateTaken')->nullable();
            $table->time('timeTaken')->nullable();

            //interim questionnaire
            $table->string('interim48hrs01')->nullable();
            $table->string('interim48hrs02')->nullable();
            $table->string('interim48hrs03')->nullable();
            $table->string('interim48hrs04')->nullable();
            $table->string('interim48hrs05')->nullable();
            $table->string('interim48hrs06')->nullable();
            $table->string('interim48hrs07')->nullable();
            $table->string('interim48hrs08')->nullable();

            //interviewed and checked by
            $table->string('Interim48hrsInterviewedby')->nullable();
            $table->string('Interim48hrsCheckedby')->nullable();

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
        Schema::dropIfExists('s_p4__i_q48_s');
    }
}
