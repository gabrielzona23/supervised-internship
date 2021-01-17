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
            $table->string('city')->default('Rio Branco'); //ok
            $table->string('number')->default('S/N ou não informado'); //ok
            $table->string('street', 255)->nullable(); //ok
            $table->string('branch_line')->nullable();
            $table->enum('residential_area', ['Rural', 'Urbana'])->default('Urbana')->nullable(); //ok
            $table->string('state', 64)->default('Acre'); //ok
            $table->string('country', 64)->default('Brasil'); //não está sendo inserido, apenas para redundância
            $table->string('neighborhood', 64); //ok
            $table->string('cep', 32); //ok
            $table->string('complement', 255)->nullable();
            $table->string('electrical_installation_core', 32)->nullable();
            $table->string('reference', 255)->nullable();
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->enum('type_transport', ['Público', 'Privado', 'Escolar', 'Variado'])->default('Variado');
            $table->string('transport_localization', 64)->nullable();
            $table->string('route', 64)->nullable();
            $table->string('buses_name', 64)->nullable();
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
