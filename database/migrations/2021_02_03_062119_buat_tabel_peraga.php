<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelPeraga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peraga', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode')->nullable();;
            $table->unsignedBigInteger('kategori_peraga_id');
            $table->unsignedBigInteger('sumber_peraga_id');
            $table->date('tgl_diterima');
            $table->integer('jumlah');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('peraga');
    }
}
