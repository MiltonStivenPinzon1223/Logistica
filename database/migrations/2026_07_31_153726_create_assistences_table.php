<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistences', function (Blueprint $table) {
            $table->id();
            $table->time('hour');
            $table->integer('status');
            $table->foreignId('id_events')->constrained('events');
            $table->foreignId('id_logistics')->constrained('logistics');
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
        Schema::dropIfExists('assistences');
    }
};
