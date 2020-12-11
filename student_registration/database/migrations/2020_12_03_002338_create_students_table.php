<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['concluded', 'inactive']);
            $table->date('born_date')->nullable();
            $table->string('nationality', 64)->nullable();
            $table->string('ethnicity',32)->nullable();
            $table->string('breed',32)->nullable();
            $table->string('color',32)->nullable();
            $table->string('number_card_sus',32)->nullable();
            $table->string('inep_code',32)->nullable();
            $table->string('nis',32)->nullable();
            $table->foreignId('person_id');
            $table->foreignId('created_by');
            $table->timestamps();


            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
