<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthProblemsStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_problems_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_health_id');
            $table->foreignId('health_problem_id');
            $table->timestamps();

            $table->foreign('student_health_id')->references('id')->on('student_healths');
            $table->foreign('health_problem_id')->references('id')->on('health_problems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_problems_student');
    }
}
