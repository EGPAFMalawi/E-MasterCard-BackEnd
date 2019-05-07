<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_card', function (Blueprint $table) {
            $table->increments('master_card_id');
            $table->string('version')->unique();
            $table->enum('status',[0,1]);

            $table->integer('creator')->default(0);
            $table->dateTime('date_created');
            $table->integer('changed_by')->nullable();
            $table->dateTime('date_changed')->nullable();
            $table->integer('voided')->default(0);
            $table->integer('voided_by')->nullable();
            $table->dateTime('date_voided')->nullable();
            $table->string('void_reason')->nullable();

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
        Schema::dropIfExists('master_card');
    }
}
