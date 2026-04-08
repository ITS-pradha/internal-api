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
        Schema::create('sewings', function (Blueprint $table) {
            $table->id();
            $table->string('produk');
            $table->string('karu');
            $table->string('qc');
            $table->string('inner')->default('yes');
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
            $table->float('panjanginner1')->nullable();
            $table->float('lebarinner1')->nullable();
            $table->float('jarakseal1')->nullable();
            $table->string('seal1')->nullable();
            $table->string('bukaaninner1')->nullable();
            $table->string('potonganinner1')->nullable();
            $table->string('menggantung1')->nullable();
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

            $table->float('panjanginner2')->nullable();
            $table->float('lebarinner2')->nullable();
            $table->float('jarakseal2')->nullable();
            $table->string('seal2')->nullable();
            $table->string('bukaaninner2')->nullable();
            $table->string('potonganinner2')->nullable();
            $table->string('menggantung2')->nullable();

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
        Schema::dropIfExists('sewings');
    }
};
