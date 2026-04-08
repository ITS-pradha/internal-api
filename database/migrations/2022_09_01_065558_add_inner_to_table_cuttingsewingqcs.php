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
        Schema::table('cuttingsewingqcs', function (Blueprint $table) {
            $table->float('panjanginner1')->nullable();
            $table->float('lebarinner1')->nullable();
            $table->float('jarakseal1')->nullable();
            $table->string('seal1')->nullable();
            $table->string('bukaaninner1')->nullable();
            $table->string('potonganinner1')->nullable();
            $table->string('menggantung1')->nullable();
            $table->float('panjanginner2')->nullable();
            $table->float('lebarinner2')->nullable();
            $table->float('jarakseal2')->nullable();
            $table->string('seal2')->nullable();
            $table->string('bukaaninner2')->nullable();
            $table->string('potonganinner2')->nullable();
            $table->string('menggantung2')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuttingsewingqcs', function (Blueprint $table) {
            //
        });
    }
};
