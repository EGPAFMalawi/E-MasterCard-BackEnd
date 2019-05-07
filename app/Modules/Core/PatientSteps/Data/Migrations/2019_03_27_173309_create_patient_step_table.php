<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_step', function (Blueprint $table) {
            $table->increments('patient_step_id');
            $table->integer('patient_id')->unsigned();
            $table->date('date')->nullable();
            $table->string('site')->nullable();
            $table->string('step');
            $table->string('origin_destination')->nullable();
            $table->string('art_number');

            $table->foreign('patient_id')
                ->references('patient_id')
                ->on('patient')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_step');
    }
}
