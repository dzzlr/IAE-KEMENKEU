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
            $table->integer('nomor_kebijakan');
            $table->string('judul_kebijakan');
            $table->string('nama_penandatanganan');
            $table->string('tanda_tangan');
            $table->string('isi');
            $table->string('tempat_ditetapkan');
            $table->date('tanggal_ditetapkan');
            $table->string('tentang');
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
