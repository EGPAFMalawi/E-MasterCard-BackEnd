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
            $table->integer('retired')->default(0);
            $table->string('short_name')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('form_text')->nullable();
            $table->integer('datatype_id')->unsigned()->default(0);
            $table->integer('class_id')->default(0);
            $table->integer('is_set')->default(0);

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('default_charge')->nullable();
            $table->string('version')->nullable();
            $table->integer('changed_by')->nullable();
            $table->dateTime('date_changed')->nullable();

            $table->integer('retired_by')->nullable();
            $table->dateTime('date_retired')->nullable();
            $table->string('retire_reason')->nullable();

            $table->string('uuid', 38)->unique();

            $table->foreign('datatype_id')
                ->references('concept_datatype_id')
                ->on('concept_datatype')
                ->onDelete('cascade');
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
