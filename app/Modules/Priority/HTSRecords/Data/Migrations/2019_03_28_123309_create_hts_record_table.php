<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHTSRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hts_record', function (Blueprint $table) {
            $table->increments('hts_record_id');
            $table->integer('age');
            $table->string('sex');
            $table->string('status');
            $table->string('modality');

            $table->integer('year');
            $table->integer('month');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hts_record');
    }
}
