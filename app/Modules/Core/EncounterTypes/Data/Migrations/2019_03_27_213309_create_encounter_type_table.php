<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncounterTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encounter_type', function (Blueprint $table) {
            $table->increments('encounter_type_id');
            $table->string('name')->default('');
            $table->mediumText('description')->nullable();

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
        Schema::dropIfExists('encounter_type');
    }
}
