<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_details', function (Blueprint $table) {
            $table->id();
            $table->string('type_of_certificate', 64)->nullable();
            $table->string('name_registry')->nullable();
            $table->string('city_registry', 64)->nullable();
            $table->string('state_registry', 64)->nullable();
            $table->string('term_number', 64)->nullable();
            $table->string('sheet_number')->nullable();
            $table->string('book_number')->nullable();
            $table->string('emission_date', 32)->nullable();
            $table->foreignId('document_type_id');
            $table->timestamps();

            $table->foreign('document_type_id')->references('id')->on('identifying_document_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_details');
    }
}
