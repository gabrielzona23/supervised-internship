<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_information', function (Blueprint $table) {
            $table->id();
            $table->string('course_name', 64)->nullable();
            $table->string('modality', 64);
            $table->string('class', 64)->nullable();
            $table->string('previous_result', 64)->nullable();
            $table->string('type_of_teaching', 64)->nullable();
            $table->string('stage', 64);
            $table->enum('turn', ['matutino', 'vespertino', 'noturno', 'integral']);

            $table->foreignId('registration_id');
            $table->timestamps();

            $table->foreign('registration_id')->references('id')->on('registrations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educational_information');
    }
}
