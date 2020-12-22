<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaleAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scale_answers', function (Blueprint $table) {
            $table->id();
            $table->enum('value',['1','2','3','4','5'])->default('1');
            $table->foreignId('question_id')->constrained('questions');
            $table->foreignId('registration_id')->constrained('registrations');
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
        Schema::dropIfExists('scale_answers');
    }
}
