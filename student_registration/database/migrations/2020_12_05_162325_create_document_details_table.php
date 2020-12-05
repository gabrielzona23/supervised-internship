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
            $table->string('type_of_certificate',64);
            $table->string('term_number',64);
            $table->string('name_registry',64);
            $table->string('city_registry',64);
            $table->string('stage_registry',64);
            $table->string('emission_date',32);
            $table->integer('sheet_number');
            $table->integer('book_number');
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
