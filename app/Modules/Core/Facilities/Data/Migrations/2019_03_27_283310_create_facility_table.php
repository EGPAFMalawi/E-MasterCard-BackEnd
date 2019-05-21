<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility', function (Blueprint $table) {
            $table->increments('facility_id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('zone')->nullable();
            $table->string('type')->nullable();
            $table->string('district_code')->nullable();
            $table->string('mga')->nullable();
            $table->string('ftype')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->string('ngo')->nullable();

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
        Schema::dropIfExists('facility');
    }
}
