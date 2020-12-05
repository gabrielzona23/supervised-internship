<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_person', function (Blueprint $table) {
            $table->id();
            $table->string('workplace_name',64);
            $table->string('length_of_service',64);
            $table->string('hours_worked_daily',32);
            $table->foreignId('job_id');
            $table->foreignId('person_id');
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('job_id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_person');
    }
}
