<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    public function anggota()
    {
        return $this->belongsToMany(Anggota::class, 'peminjaman_buku', 'idAnggota', 'idBuku');
    }

}
