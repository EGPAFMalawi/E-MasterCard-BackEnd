<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientIdentifierTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_identifier_type', function (Blueprint $table) {
            $table->increments('patient_identifier_type_id');
            $table->string('name')->default('');
            $table->mediumText('description');
            $table->string('format')->nullable();
            $table->integer('check_digit')->default(0);
            $table->integer('required')->default(0);
            $table->string('format_description')->nullable();
            $table->string('validator')->nullable();

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('retired')->default(0);
            $table->integer('retired_by')->nullable();
            $table->dateTime('date_retired')->nullable();
            $table->string('retire_reason')->nullable();

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
        Schema::dropIfExists('patient_identifier_type');
    }
}
