<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('database.tables.jobs'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('desc');
            $table->dateTime('accept_interviews_from');
            $table->dateTime('accept_interviews_until');
            $table->dateTime('interviews_duration');
            $table->integer('recruiter_id');
            $table->timestamps();


            /*
             * must be run after creating the recruiters table
             */

//            $table->foreign('recruiter_id')
//                ->references('id')
//                ->on('recruiters')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('database.tables.jobs'));
    }
}
