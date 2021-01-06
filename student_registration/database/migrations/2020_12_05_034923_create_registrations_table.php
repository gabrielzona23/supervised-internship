<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('status_progress', 32)->nullable(); //porcentagem da matricula respondida
            $table->string('status', 32)->nullable(); //acho que é transferido, trancado, desistência
            $table->boolean('image_authorization')->nullable();
            $table->boolean('parents_divorced')->nullable();
            $table->boolean('guard_document')->nullable();
            $table->string('student_custody', 32)->nullable();
            $table->timestamp('school_year', 16)->nullable();
            $table->string('number_card_family_bag', 32)->nullable();
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('updated_by')->constrained('users');
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
        Schema::dropIfExists('registrations');
    }
}
