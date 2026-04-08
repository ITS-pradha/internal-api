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
        Schema::table('cuttingsewings', function (Blueprint $table) {
            $table->string('hotseal')->nullable();
            $table->double('panjanginner')->nullable();
            $table->double('lebarinner')->nullable();
            $table->double('mikron')->nullable();
            $table->double('beratinner')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuttingsewings', function (Blueprint $table) {
            //
        });
    }
};
