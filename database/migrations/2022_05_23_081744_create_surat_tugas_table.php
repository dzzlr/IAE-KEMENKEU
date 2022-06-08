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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->integer('no_surat');
            $table->integer('id_user');
            $table->integer('nomor_izin');
            $table->string('lingkup_kegiatan');
            $table->string('alamat');
            $table->date('tanggal_kegiatan');
            $table->string('tanda_tangan');
            $table->string('tempat_id');
            $table->date('tanggal_ttd');
            $table->string('nama_penandatangan');
            $table->string('status')->default('Diproses');
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
        Schema::dropIfExists('surat_tugas');
    }
};
