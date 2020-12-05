<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialNeedStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_need_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('special_need_id');
            $table->foreignId('student_id');
            $table->timestamps();

            $table->foreign('special_need_id')->references('id')->on('special_needs');
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
        Schema::dropIfExists('special_need_student');
    }
}
