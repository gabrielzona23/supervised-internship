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
            $table->string('number')->nullable();
            $table->string('street', 255)->nullable();
            $table->string('branch_line')->nullable();
            $table->enum('residential_area', ['Rural', 'Urbana'])->default('Urbana')->nullable();
            $table->string('state', 64)->default('Acre');
            $table->string('country', 64)->default('Brasil');
            $table->string('neighborhood', 64);
            $table->string('cep', 32);
            $table->string('complement', 255)->nullable();
            $table->string('electrical_installation_core', 32)->nullable();
            $table->string('reference', 255)->nullable();
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
