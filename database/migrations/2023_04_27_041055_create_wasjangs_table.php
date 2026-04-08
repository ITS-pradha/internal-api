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
        Schema::create('wasjangs', function (Blueprint $table) {
            $table->id();
            $table->string('nowasjang');
            $table->string('tgl_pelaporan');
            $table->string('pin_reporter');
            $table->string('reporter');
            $table->string('department_temuan');
            $table->string('detail_temuan');
            $table->string('saran_temuan');
            $table->string('foto_temuan');
            $table->string('lokasi_temuan');
            $table->string('status');
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
        Schema::dropIfExists('wasjangs');
    }
};
