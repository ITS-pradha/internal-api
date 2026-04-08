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
        Schema::create('cuttingsewingqcs', function (Blueprint $table) {
            $table->id();
            $table->string('karu');
            $table->string('qc');
            $table->integer('idcuttingsewing');
            $table->float('panjang1');
            $table->float('lebar1');
            $table->float('ekor1');
            $table->float('lipatan1');
            $table->float('jarakjahitan1');
            $table->float('stick10cm1');
            $table->float('berat1');
            $table->float('mudahdibuka1');
            $table->float('potonganmiring1');
            $table->float('karunglemas1');
            $table->float('panjang2');
            $table->float('lebar2');
            $table->float('ekor2');
            $table->float('lipatan2');
            $table->float('jarakjahitan2');
            $table->float('stick10cm2');
            $table->float('berat2');
            $table->float('mudahdibuka2');
            $table->float('potonganmiring2');
            $table->float('karunglemas2');
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
        Schema::dropIfExists('cuttingsewingqcs');
    }
};
