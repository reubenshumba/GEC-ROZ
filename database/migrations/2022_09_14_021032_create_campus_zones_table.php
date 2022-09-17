<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampusZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_zones', function (Blueprint $table) {
            $table->id();
            $table->string('zoneName',250)->unique();
            $table->string('url',250)->unique();
            $table->timestamps();
            $table->index(['zoneName', 'url']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campus_zones');
    }
}
