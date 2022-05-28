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
        Schema::create('kebijakan', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_peraturan');
            $table->string('nama_peraturan');
            $table->string('isi_peraturan');
            $table->string('tempat_di_tempatkan');
            $table->date('tanggal_di_tetapkan');
            $table->string('nama_penandatanganan');
            $table->string('tanda_tangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kebijakans');
    }
};
