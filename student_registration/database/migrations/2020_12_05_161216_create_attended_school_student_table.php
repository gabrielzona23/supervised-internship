<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendedSchoolStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attended_school_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schools_id');
            $table->foreignId('student_id');
            $table->timestamps();

            $table->foreign('schools_id')->references('id')->on('attended_schools');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attended_school_student');
    }
}
