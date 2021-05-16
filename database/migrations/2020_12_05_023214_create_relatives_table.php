<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatives', function (Blueprint $table) {
            $table->id();
            $table->string('type',32);
            $table->string('education_level',32);
            $table->string('schooling',32);
            $table->string('kinship',32);
            $table->boolean('working')->default(0);
            $table->foreignId('person_id')->constrained('persons');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('deleted_by')->constrained('users')->nullable();
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
        Schema::dropIfExists('relatives');
    }
}
