<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concept', function (Blueprint $table) {
            $table->increments('concept_id');
            $table->string('gender')->default('')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('birthdate_estimated')->default(0);
            $table->integer('dead')->default(0);
            $table->dateTime('death_date')->nullable();
            $table->integer('cause_of_death')->nullable();

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('changed_by')->nullable();
            $table->dateTime('date_changed')->nullable();
            $table->integer('voided')->default(0);
            $table->integer('voided_by')->nullable();
            $table->dateTime('date_voided')->nullable();
            $table->string('void_reason')->nullable();

            $table->string('uuid', 38)->unique();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concept');
    }
}
