<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_surat')->unique();
            $table->date('tanggal_surat');
            $table->string('asal_surat');
            $table->string('index_surat');
            $table->string('file_surat');
            $table->string('jumlah_lampiran');
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
        Schema::dropIfExists('daftar_surat_masuks');
    }
}
