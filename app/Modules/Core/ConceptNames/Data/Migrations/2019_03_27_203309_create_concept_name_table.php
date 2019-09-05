<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concept_name', function (Blueprint $table) {
            $table->increments('concept_name_id');
            $table->integer('concept_id')->unsigned()->nullable();
            $table->string('name')->default('');
            $table->string('locale')->default('');

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('changed_by')->nullable();
            $table->dateTime('date_changed')->nullable();
            $table->integer('voided')->default(0);
            $table->integer('voided_by')->nullable();
            $table->dateTime('date_voided')->nullable();
            $table->string('void_reason')->nullable();

            $table->string('uuid', 38)->unique();

            $table->string('concept_name_type')->nullable();
            $table->integer('locale_preferred')->default(0);

            $table->foreign('concept_id')
                ->references('concept_id')
                ->on('concept')
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
        Schema::dropIfExists('concept_name');
    }
}
