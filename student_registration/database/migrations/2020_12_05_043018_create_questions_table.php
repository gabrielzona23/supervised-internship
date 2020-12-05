<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->enum('type',['scalar1','trueFalse','scalar2','scalar3','numeric', 'textual'])->default('textual');
            $table->foreignId('module_question_id');
            $table->timestamp('deleted_at');
            $table->timestamps();

            $table->foreign('module_question_id')->references('id')->on('module_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
