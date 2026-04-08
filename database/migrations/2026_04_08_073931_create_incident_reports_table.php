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
        Schema::create('incident_reports', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pelaporan')->nullable();
            $table->text('reporter')->nullable();
            $table->string('pin_reporter')->nullable();
            $table->string('tanpa_nama')->nullable();
            $table->date('tglkejadian')->nullable();
            $table->string('devisi')->nullable();
            $table->string('pihak_terlibat')->nullable();
            $table->string('jenislaporan')->nullable();
            $table->text('detailkejadian')->nullable();
            $table->string('lokasi_temuan')->nullable();
            $table->string('kategori_temuan')->nullable();
            $table->string('sifatlaporan')->nullable();
            $table->text('masukanjikaada')->nullable();
            $table->string('menimbulkanpotensi')->nullable();
            $table->string('nominal')->nullable();
            $table->string('bukti_temuan')->nullable();
            $table->string('IRnumber')->nullable();
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
        Schema::dropIfExists('incident_reports');
    }
};
