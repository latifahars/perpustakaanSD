<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    public function kategori()
    {
    	return $this->belongsTo(KategoriBuku::class);
	}
	public function penerbit()
    {
    	return $this->belongsTo(Penerbit::class);
	}
	public function sumber()
    {
    	return $this->belongsTo(SumberBuku::class);
	}
	public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
