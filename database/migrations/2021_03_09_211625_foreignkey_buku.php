<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignkeyBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->foreign('kategori_buku_id')->references('id')->on('kategori_buku')->onDelete('CASCADE');
            $table->foreign('penerbit_id')->references('id')->on('penerbit')->onDelete('CASCADE');
            $table->foreign('sumber_buku_id')->references('id')->on('sumber_buku')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
