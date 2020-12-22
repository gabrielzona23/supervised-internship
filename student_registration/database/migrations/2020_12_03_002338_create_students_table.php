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
            $table->enum('status', ['studying','concluded', 'inactive'])->default('studying');
            $table->date('born_date')->nullable();
            $table->string('nationality', 64)->nullable();
            $table->string('ethnicity',32)->nullable();
            $table->string('breed',32)->nullable();
            $table->string('color',32)->nullable();
            $table->string('number_card_sus',32)->nullable();
            $table->string('inep_code',32)->nullable();
            $table->string('nis',32)->nullable();
            $table->foreignId('person_id')->constrained('persons');
            $table->foreignId('created_by')->constrained('users');
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
        Schema::dropIfExists('students');
    }
}
