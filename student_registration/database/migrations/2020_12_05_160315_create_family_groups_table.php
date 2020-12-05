<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_members');
            $table->integer('number_of_dependents');
            $table->integer('number_of_older_brothers');
            $table->integer('number_of_younger_brothers');
            $table->integer('income');
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
        Schema::dropIfExists('family_groups');
    }
}
