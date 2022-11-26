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
            $table->integer('baik');
            $table->integer('sedang');
            $table->integer('berat');
            $table->integer('total_panjang');
            $table->integer('kebutuhan_1m');
            $table->integer('kebutuhan_2m');
            $table->integer('kebutuhan_3m');
            $table->integer('kebutuhan_4m');
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
