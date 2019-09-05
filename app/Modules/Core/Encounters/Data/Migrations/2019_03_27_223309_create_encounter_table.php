<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encounter', function (Blueprint $table) {
            $table->increments('encounter_id');
            $table->integer('encounter_type')->unsigned();
            $table->integer('patient_id')->unsigned()->default(0);
            $table->integer('provider_id')->unsigned()->default(0);
            $table->integer('location_id')->nullable();
            $table->integer('form_id')->nullable();
            $table->dateTime('encounter_datetime');

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('changed_by')->nullable();
            $table->dateTime('date_changed')->nullable();
            $table->integer('voided')->default(0);
            $table->integer('voided_by')->nullable();
            $table->dateTime('date_voided')->nullable();
            $table->string('void_reason')->nullable();

            $table->string('uuid', 38)->unique();

            $table->integer('program_id')->nullable();

            $table->foreign('patient_id')
                ->references('patient_id')
                ->on('patient')
                ->onDelete('restrict');

            $table->foreign('encounter_type')
                ->references('encounter_type_id')
                ->on('encounter_type')
                ->onDelete('restrict');

            $table->foreign('provider_id')
                ->references('person_id')
                ->on('person')
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
        Schema::dropIfExists('encounter');
    }
}
