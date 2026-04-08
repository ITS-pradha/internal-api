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
        Schema::create('specsheets', function (Blueprint $table) {
            $table->id();
            $table->string("so");
            $table->string("customer");
            $table->string("orderkategori");
            $table->double("qty");
            $table->double("mintoleransi");
            $table->double("maxtoleransi");
            $table->tinyInteger("ganjil")->default("0");
            $table->tinyInteger("printing")->default("0");
            $table->integer("printingdepan")->nullable();
            $table->integer("printingbelakang")->nullable();
            $table->string("artwork")->nullable();
            $table->double("hargajual")->default("0");
            $table->double("komisi")->default("0");
            $table->double("biayajahitbawah")->default("0");
            $table->double("biayajahitmulut")->default("0");
            $table->double("biayaangkut")->default("0");
            $table->double("biayalainlain")->default("0");
            $table->string("warnakarung")->nullable();
            $table->string("motifkarung")->nullable();
            $table->string("keteranganmotif")->nullable();
            $table->double("denier")->default("0");
            $table->string("kodebal")->nullable();
            $table->double("lebarkarung")->default("0");
            $table->double("minlebarkarung")->default("0");
            $table->double("maxlebarkarung")->default("0");
            $table->double("panjangkarung")->default("0");
            $table->double("jarakjahitbawah")->default("0");
            $table->double("jarakjahitatas")->default("0");
            $table->double("panjangpolos")->default("0");
            $table->double("minberatkarung")->default("0");
            $table->double("rataberatkarung")->default("0");
            $table->double("stickjahitbawah")->default("0");
            $table->double("anyamanpakan")->default("0");
            $table->double("anyamanlusi")->default("0");
            $table->string("warnabenangjahitbawah")->nullable();
            $table->tinyInteger("inner")->default("0");
            $table->double("kualitasinner")->default("0");
            $table->double("bahaninner")->default("0");
            $table->double("lebarinner")->default("0");
            $table->double("minlebarinner")->default("0");
            $table->double("maxlebarinner")->default("0");
            $table->double("jaraksealbawah")->default("0");

            $table->double("jaraksealatas")->default("0");
            $table->double("panjanginner")->default("0");
            $table->double("ketebalan")->default("0");
            $table->tinyInteger("jahitbawahdgkarng")->default("0");
            $table->tinyInteger("jahitultrasonaic")->default("0");
            $table->tinyInteger("tekukleher")->default("0");

            $table->double("minberatinner")->default("0");
            $table->double("avgberatinner")->default("0");
            $table->double("minberatouter")->default("0");
            $table->double("avgberatouter")->default("0");
            $table->string("note")->nullable();


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
        Schema::dropIfExists('specsheets');
    }
};
