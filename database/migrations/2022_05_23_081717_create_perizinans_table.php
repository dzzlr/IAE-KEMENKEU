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
        Schema::create('perizinan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('no_izin');
            $table->integer('no_induk');
            $table->integer('no_register_penilai');
            $table->string('KJPP');
            $table->string('klasifikasi_izin');
            $table->date('tanggal_izin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perizinans');
    }
};
