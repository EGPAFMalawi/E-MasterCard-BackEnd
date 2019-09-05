<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraditionalAuthorityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traditional_authority', function (Blueprint $table) {
            $table->increments('traditional_authority_id');
            $table->string('name')->default('');
            $table->string('hl7_abbreviation')->nullable();
            $table->string('description')->default('');

            $table->unsignedInteger('district_id');

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('retired')->default(0);
            $table->integer('retired_by')->nullable();
            $table->dateTime('date_retired')->nullable();
            $table->string('retire_reason')->nullable();

            $table->foreign('district_id')
                ->references('district_id')
                ->on('district')
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
        Schema::dropIfExists('traditional_authority');
    }
}
