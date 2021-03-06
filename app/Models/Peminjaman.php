<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getStatus() {
        return $this->deadline < Carbon::today();
    }
}
