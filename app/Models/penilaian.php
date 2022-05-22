<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class,);
    }
    public function isAdmin()
    {
        return $this->admin;
    }

    
}
