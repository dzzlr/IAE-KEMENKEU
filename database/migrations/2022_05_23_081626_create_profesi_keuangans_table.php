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
        Schema::create('profesi_keuangan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('nik');
            $table->integer('npw');
            $table->string('nama');
            $table->string('agama');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('alamat');
            $table->string('pangkat');
            $table->string('gelar');
            $table->string('jabatan');
            $table->integer('umur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesi_keuangans');
    }
};
