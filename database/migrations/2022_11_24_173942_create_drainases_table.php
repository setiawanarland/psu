<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrainasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drainases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lokasi_id')->constrained('lokasis');
            $table->integer('baik');
            $table->integer('sedang');
            $table->integer('berat');
            $table->integer('total_panjang');
            $table->integer('kebutuhan_40cm');
            $table->integer('kebutuhan_50cm');
            $table->integer('kebutuhan_60cm');
            $table->integer('terlayani');
            $table->string('satuan', 50)->default('cm');
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
        Schema::dropIfExists('drainases');
    }
}
