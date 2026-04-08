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
       Schema::create('heavyWasjangs', function (Blueprint $table) {
            $table->id();
            $table->string('nowasjang')->nullable();
            $table->date('tgl_pelaporan')->nullable();
            $table->string('pin_reporter')->nullable();
            $table->string('reporter')->nullable();
            $table->string('department_temuan')->nullable();
            $table->string('terlapor')->nullable();
            $table->text('detail_temuan')->nullable();
            $table->text('saran_temuan')->nullable();
            $table->string('foto_temuan')->nullable();
            $table->string('lokasi_temuan')->nullable();
            $table->string('tanpa_nama')->nullable();
            $table->string('no_wasjang_sebelumnya')->default('-');
            $table->string('status')->default('-');
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
        //
    }
};
