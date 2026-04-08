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
        Schema::create('printings', function (Blueprint $table) {
            $table->id();
            $table->string("namaqc");
            $table->string("namakaru");
            $table->string("namaalat");
            $table->string("namaproduk");
            $table->string("noroll")->nullable();
            $table->date("tanggalroll")->nullable();
            $table->double("beratroll")->nullable();
            $table->string("design");
            $table->double("panjang")->nullable();
            $table->double("lebar");
            $table->double("beratkarungstd")->nullable();
            $table->double("beratkarungact")->nullable();
            $table->string("tinta1warna")->nullable();
            $table->double("tinta1kekentalan")->nullable();
            $table->string("tinta2warna")->nullable();
            $table->double("tinta2kekentalan")->nullable();
            $table->string("tinta3warna")->nullable();
            $table->double("tinta3kekentalan")->nullable();
            $table->string("tinta4warna")->nullable();
            $table->double("tinta4kekentalan")->nullable();
            $table->string("tinta5warna")->nullable();
            $table->double("tinta5kekentalan")->nullable();
            $table->string("tinta6warna")->nullable();
            $table->double("tinta6kekentalan")->nullable();
            $table->string("tinta7warna")->nullable();
            $table->double("tinta7kekentalan")->nullable();
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
        Schema::dropIfExists('printings');
    }
};
