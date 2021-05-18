<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberPeraga extends Model
{
    use HasFactory;

    protected $table = 'sumber_peraga';

    public function peraga()
    {
        return $this->hasMany(Peraga::class);
    }

}
