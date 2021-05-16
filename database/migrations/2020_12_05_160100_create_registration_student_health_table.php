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
            $table->foreignId('student_health_id')->constrained('student_health_questions');
            $table->foreignId('registration_id')->constrained('registrations');
            $table->string('value');
            $table->boolean('current')->default(1);
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
        Schema::dropIfExists('registration_student_health');
    }
}
