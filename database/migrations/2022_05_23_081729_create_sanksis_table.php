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
        Schema::create('sanksi', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_sanksi');
            $table->string('nama_sanksi');
            $table->string('nama_penandatangan');
            $table->string('tanda_tangan');
            $table->string('isi_sanksi');
            $table->string('tempat_ditetapkan');
            $table->string('status')->default('Diproses');
            $table->date('tanggal_ditetapkan');
            $table->string('tentang');
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
        Schema::dropIfExists('sanksis');
    }
};
