<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peraga extends Model
{
    use HasFactory;
    
    protected $table = 'peraga';
    protected $fillable = ['nama','kode','kategori_peraga_id','sumber_peraga_id', 'tgl_diterima','jumlah', 'user_id','created_at', 'updated_at'];

    public function kategori()
    {
    	return $this->belongsTo(KategoriPeraga::class, 'kategori_peraga_id');
	}

	public function sumber()
    {
    	return $this->belongsTo(SumberPeraga::class, 'sumber_peraga_id');
	}
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
