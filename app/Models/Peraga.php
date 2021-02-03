<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peraga extends Model
{
    use HasFactory;
    
    protected $table = 'peraga';

     public function kategori()
    {
    	return $this->belongsTo(KategoriPeraga::class);
	}
}
