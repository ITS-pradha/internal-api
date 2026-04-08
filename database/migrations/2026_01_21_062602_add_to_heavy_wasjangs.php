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
        Schema::table('heavyWasjangs', function (Blueprint $table) {
          $table->string('total_nominal')->nullable();          
          $table->string('no_wasjang_kedua')->nullable();          
          $table->string('dana_wasjang_berat')->nullable();          
          $table->string('tindakan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('heavy_wasjangs', function (Blueprint $table) {
            //
        });
    }
};
