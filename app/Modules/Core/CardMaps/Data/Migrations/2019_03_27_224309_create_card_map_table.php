<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_card_map', function (Blueprint $table) {
            $table->integer('concept_id')->unsigned();
            $table->integer('encounter_type_id')->unsigned();
            $table->integer('master_card_id')->unsigned();

            $table->foreign('concept_id')
                ->references('concept_id')
                ->on('concept')
                ->onDelete('cascade');
            $table->foreign('encounter_type_id')
                ->references('encounter_type_id')
                ->on('encounter_type')
                ->onDelete('cascade');
            $table->foreign('master_card_id')
                ->references('master_card_id')
                ->on('master_card')
                ->onDelete('cascade');

            $table->primary(['concept_id', 'encounter_type_id', 'master_card_id'], 'master_card_mappings');

        });

        Schema::create('patient_card_map', function (Blueprint $table) {
            $table->integer('encounter_id')->unsigned();
            $table->integer('patient_card_id')->unsigned();

            $table->foreign('encounter_id')
                ->references('encounter_id')
                ->on('encounter')
                ->onDelete('cascade');
            $table->foreign('patient_card_id')
                ->references('patient_card_id')
                ->on('patient_card')
                ->onDelete('cascade');

            $table->primary(['encounter_id', 'patient_card_id'], 'patient_card_mappings');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_card_map');
        Schema::dropIfExists('patient_card_map');
    }
}
