<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRozRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roz_registers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('address',250)->nullable();
            $table->bigInteger('number');
            $table->string('occupation',250)->nullable();//->unique()
            $table->string('maritalStatus');
            $table->boolean('saved');
            $table->boolean('callMe');
            $table->boolean('church');
            $table->unsignedBigInteger('zoneID')->nullable()->default(null);
            $table->foreign('zoneID')->references('id')->on('zones');
            $table->index(['zoneID']);
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
        Schema::dropIfExists('roz_registers');
    }
}
