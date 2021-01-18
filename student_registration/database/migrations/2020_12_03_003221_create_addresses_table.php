<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street', 255)->nullable(); //ok
            $table->string('city', 128)->default('Rio Branco'); //ok
            $table->string('state', 64)->default('Acre'); //ok
            $table->string('neighborhood', 64); //ok
            $table->string('country', 64)->default('Brasil');
            $table->string('cep', 16); //ok
            $table->string('number', 32)->default('S/N ou não informado'); //ok no futuro incluir booleano quando não for informado número
            $table->string('electrical_installation_core', 32)->nullable(); //ok
            $table->enum('residential_area', ['Rural', 'Urbana'])->default('Urbana')->nullable(); //ok
            $table->enum('type_transport', ['Público', 'Particular', 'Escolar', 'Variado'])->default('Variado');
            $table->string('reference', 255)->nullable(); //ok
            $table->string('complement', 255)->nullable(); //ok
            $table->string('buses_name', 64)->nullable(); //ok
            $table->string('transport_localization', 64)->nullable(); //ok
            $table->string('route', 64)->nullable(); //ok
            $table->string('branch_line')->nullable(); //no momento não vi ter
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
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
        Schema::dropIfExists('addresses');
    }
}
