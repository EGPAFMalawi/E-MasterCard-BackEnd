<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obs', function (Blueprint $table) {
            $table->increments('obs_id');
            $table->integer('person_id')->unsigned();
            $table->integer('concept_id')->unsigned()->default(0);
            $table->integer('encounter_id')->unsigned()->nullable();
            $table->integer('order_id')->unsigned()->nullable();
            $table->dateTime('obs_datetime');
            $table->integer('location_id')->nullable();
            $table->integer('obs_group_id')->nullable();
            $table->string('accession_number')->nullable();
            $table->integer('value_group_id')->nullable();
            $table->boolean('value_boolean')->nullable();
            $table->integer('value_coded')->nullable();
            $table->integer('value_coded_name_id')->nullable();
            $table->integer('value_drug')->nullable();
            $table->dateTime('value_datetime')->nullable();
            $table->float('value_numeric')->nullable();
            $table->string('value_modifier')->nullable();
            $table->mediumText('value_text')->nullable();
            $table->dateTime('date_started')->nullable();
            $table->dateTime('date_stopped')->nullable();
            $table->string('comments')->nullable();

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('voided')->default(0);
            $table->integer('voided_by')->nullable();
            $table->dateTime('date_voided')->nullable();
            $table->string('void_reason')->nullable();

            $table->string('value_complex')->nullable();
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
        Schema::dropIfExists('obs');
    }
}
