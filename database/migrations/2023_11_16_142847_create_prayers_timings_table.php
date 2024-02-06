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
        Schema::create('prayers_timings', function (Blueprint $table) {
            $table->id('id');
            $table->time('fajar_jamat');
            $table->time('zuhr_jamat');
            $table->time('asr_jamat');
            $table->time('maghrib_jamat');
            $table->time('Isha_jamat');
            $table->time('sun_rise');
            $table->time('chaasht');
            $table->time('zawal');
            $table->time('jumua');
            $table->time('jumma_ijtimah');
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
        Schema::dropIfExists('prayers_timings');
    }
};
