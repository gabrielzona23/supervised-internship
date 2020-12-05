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
            $table->string('city')->default('Rio Branco');
            $table->integer('number')->nullable();
            $table->string('street',64)->nullable();
            $table->string('branch_line')->nullable();
            $table->string('residential_area',32);
            $table->string('state',32)->default('Acre');
            $table->string('country',32)->default('Brasil');
            $table->string('neighborhood', 32);
            $table->string('cep',32);
            $table->string('complement',64)->nullable();
            $table->string('electrical_installation_core',32)->nullable();
            $table->string('reference', 64)->nullable();
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
