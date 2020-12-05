<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsibliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsiblies', function (Blueprint $table) {
            $table->id();
            $table->boolean('family_bag')->default(0);
            $table->boolean('active')->default(1);
            $table->string('number_card_family_bag',32);
            $table->string('nis',32);
            $table->string('kinship',32);
            $table->foreignId('created_by');
            $table->foreignId('person_id');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('person_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsiblies');
    }
}
