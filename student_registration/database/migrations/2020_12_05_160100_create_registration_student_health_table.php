<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationStudentHealthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_student_health', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_health_id');
            $table->foreignId('registration_id');
            $table->timestamps();

            $table->foreign('registration_id')->references('id')->on('registrations');
            $table->foreign('student_health_id')->references('id')->on('student_healths');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration_student_health');
    }
}
