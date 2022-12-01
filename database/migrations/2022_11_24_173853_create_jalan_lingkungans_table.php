<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJalanLingkungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalan_lingkungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lokasi_id')->constrained('lokasis');
            $table->float('baik');
            $table->float('sedang');
            $table->float('berat');
            $table->float('total_panjang');
            $table->float('kebutuhan_1m');
            $table->float('kebutuhan_2m');
            $table->float('kebutuhan_3m');
            $table->float('kebutuhan_4m');
            $table->integer('terlayani');
            $table->string('satuan', 50)->default('meter');
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
        Schema::dropIfExists('jalan_lingkungans');
    }
}
