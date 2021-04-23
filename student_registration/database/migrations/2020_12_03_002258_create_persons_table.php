<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('image')->nullable();
            $table->string('rg', 32)->nullable();
            $table->string('cpf', 32)->nullable();
            $table->string('nis', 32)->nullable();
            $table->string('born_city', 64)->nullable();
            $table->string('emitter_rg', 32)->nullable();
            $table->string('phone1', 16);
            $table->string('phone2', 16)->nullable();
            $table->string('born_state', 64)->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->string('gender', 32)->default('others')->nullable();
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->softDeletes();
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
        Schema::dropIfExists('persons');
    }
}
