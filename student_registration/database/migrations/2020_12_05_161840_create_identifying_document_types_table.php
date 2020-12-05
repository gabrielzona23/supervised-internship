<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentifyingDocumentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifying_document_types', function (Blueprint $table) {
            $table->id();
            $table->string('another_document',64);
            $table->boolean('model');
            $table->string('document_number',32);
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
        Schema::dropIfExists('identifying_document_types');
    }
}
