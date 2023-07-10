<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
   
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'peminjaman_buku', 'idAnggota', 'idBuku');
    }

}
