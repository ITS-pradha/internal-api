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
        Schema::create('hotseals', function (Blueprint $table) {
            $table->id();
            $table->string('produk');
            $table->string('karu');
            $table->string('qc');
            $table->string('nomormesin');
            $table->double('panjangkarung');
            $table->double('lebartekukan');
            $table->string('kerataan');
            $table->string('antara');
            $table->string('dayarekat');

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
        Schema::dropIfExists('hotseals');
    }
};
