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
            $table->string('status_progress',32);
            $table->string('status',32);
            $table->boolean('image_authorization');
            $table->boolean('parents_divorced');
            $table->boolean('guard_document');
            $table->string('student_custody',32);
            $table->string('nis',32);
            $table->string('number_card_family_bag',32);
            $table->foreignId('student_id');
            $table->foreignId('updated_by');
            $table->foreignId('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
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
        Schema::dropIfExists('registrations');
    }
}
