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
        Schema::table('specsheets', function (Blueprint $table) {
            $table->string('kualitasbenang');
            $table->double('indexharga');
            $table->double('hargaprinting');
            $table->string('kuattarik');
            $table->string('droptest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specsheets', function (Blueprint $table) {
            //
        });
    }
};
