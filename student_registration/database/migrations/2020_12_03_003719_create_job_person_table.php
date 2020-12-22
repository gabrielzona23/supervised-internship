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
            $table->string('workplace_name',64)->nullable();
            $table->string('length_of_service',64)->nullable();
            $table->string('hours_worked_daily',32)->nullable();
            $table->foreignId('job_id')->constrained('jobs');
            $table->foreignId('person_id')->constrained('persons');
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
        Schema::dropIfExists('job_person');
    }
}
