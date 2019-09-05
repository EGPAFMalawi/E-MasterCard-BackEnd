<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientIdentifierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_identifier', function (Blueprint $table) {
            $table->increments('patient_identifier_id');
            $table->integer('patient_id')->unsigned()->default(0);
            $table->integer('identifier')->unique()->unsigned()->index();
            $table->integer('identifier_type')->unsigned();
            $table->integer('preferred')->default(0);
            $table->integer('location_id')->nullable();

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('changed_by')->nullable();
            $table->dateTime('date_changed')->nullable();
            $table->integer('voided')->default(0);
            $table->integer('voided_by')->nullable();
            $table->dateTime('date_voided')->nullable();
            $table->string('void_reason')->nullable();

            $table->string('uuid', 38)->unique();

            $table->foreign('patient_id')
                ->references('patient_id')
                ->on('patient')
                ->onDelete('restrict');

            $table->foreign('identifier_type')
                ->references('patient_identifier_type_id')
                ->on('patient_identifier_type')
                ->onDelete('restrict');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_identifier');
    }
}
