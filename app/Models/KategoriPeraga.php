<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPeraga extends Model
{
    use HasFactory;

    protected $table = 'kategori_peraga';

    public function peraga()
    {
        return $this->hasMany(Peraga::class);
    }
}
