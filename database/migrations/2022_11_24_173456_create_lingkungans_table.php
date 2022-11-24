<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLingkungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lingkungans', function (Blueprint $table) {
            $table->id();
            $table->integer('kecamatan');
            $table->bigInteger('desa_kel');
            $table->string('lingkungan', 100);
            $table->string('nama_kepala', 100);
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
        Schema::dropIfExists('lingkungans');
    }
}
