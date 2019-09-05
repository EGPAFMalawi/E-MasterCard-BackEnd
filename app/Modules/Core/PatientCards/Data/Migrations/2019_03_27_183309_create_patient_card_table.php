<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_card', function (Blueprint $table) {
            $table->increments('patient_card_id');
            $table->integer('patient_id')->unsigned();
            $table->integer('master_card_id')->unsigned();

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

            $table->foreign('master_card_id')
                ->references('master_card_id')
                ->on('master_card')
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
        Schema::dropIfExists('patient_card');
    }
}
