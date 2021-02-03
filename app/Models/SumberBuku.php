<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberBuku extends Model
{
    use HasFactory;

    protected $table = 'sumber_buku';

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
