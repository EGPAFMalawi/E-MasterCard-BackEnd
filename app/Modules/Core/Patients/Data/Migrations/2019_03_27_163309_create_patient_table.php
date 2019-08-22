<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->integer('patient_id')->unsigned();
            $table->string('guardian_name')->nullable();
            $table->string('patient_phone')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('follow_up')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->integer('soldier')->default(0);

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('changed_by')->nullable();
            $table->dateTime('date_changed')->nullable();
            $table->integer('voided')->default(0);
            $table->integer('voided_by')->nullable();
            $table->dateTime('date_voided')->nullable();
            $table->string('void_reason')->nullable();

            $table->primary(['patient_id']);

            $table->foreign('patient_id')
                ->references('person_id')
                ->on('person')
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
        Schema::dropIfExists('patient');
    }
}
