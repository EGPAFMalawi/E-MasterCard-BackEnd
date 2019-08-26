<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_name', function (Blueprint $table) {
            $table->increments('person_name_id');
            $table->integer('preferred')->default(0);
            $table->integer('person_id')->unsigned();
            $table->string('prefix')->nullable();
            $table->string('given_name')->nullable()->index();
            $table->string('middle_name')->nullable()->index();
            $table->string('family_name_prefix')->nullable();
            $table->string('family_name')->nullable()->index();
            $table->string('family_name2')->nullable();
            $table->string('family_name_suffix')->nullable();
            $table->string('degree')->nullable();

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('changed_by')->nullable();
            $table->dateTime('date_changed')->nullable();
            $table->integer('voided')->default(0);
            $table->integer('voided_by')->nullable();
            $table->dateTime('date_voided')->nullable();
            $table->string('void_reason')->nullable();

            $table->string('uuid', 38)->unique();

            $table->foreign('person_id')
                ->references('person_id')
                ->on('person')
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
        Schema::dropIfExists('person_name');
    }
}
