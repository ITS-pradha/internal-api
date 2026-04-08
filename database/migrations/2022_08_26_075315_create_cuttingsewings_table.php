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
        Schema::create('cuttingsewings', function (Blueprint $table) {
            $table->id();
            $table->string('mesin');
            $table->string('produk');
            $table->float('denier');
            $table->float('lusi');
            $table->float('pakan');
            $table->float('lebarstd');
            $table->float('panjangstd');
            $table->float('beratstd');
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
        Schema::dropIfExists('cuttingsewings');
    }
};
