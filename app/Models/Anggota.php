<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

     protected $table = 'anggota';
     protected $fillable = ['nis', 'nama', 'kelas', 'user_id'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
