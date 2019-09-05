<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_address', function (Blueprint $table) {
            $table->increments('person_address_id');
            $table->integer('person_id')->unsigned();
            $table->integer('preferred')->default(0);

            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city_village')->nullable();
            $table->string('state_province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('changed_by')->nullable();
            $table->dateTime('date_changed')->nullable();
            $table->integer('voided')->default(0);
            $table->integer('voided_by')->nullable();
            $table->dateTime('date_voided')->nullable();
            $table->string('void_reason')->nullable();

            $table->string('country_district')->nullable();
            $table->string('neighborhood_cell')->nullable();
            $table->string('region')->nullable();
            $table->string('subregion')->nullable();
            $table->string('township_division')->nullable();

            $table->string('uuid', 38)->unique();

            $table->foreign('person_id')
                ->references('person_id')
                ->on('person')
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
        Schema::dropIfExists('person_address');
    }
}
