<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('judul');
            $table->unsignedBigInteger('kategori_buku_id');
            $table->unsignedBigInteger('penerbit_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('eksemplar');
            $table->integer('halaman');
            $table->unsignedBigInteger('sumber_buku_id');
            $table->date('tgl_diterima');
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
        Schema::dropIfExists('buku');
    }
}
