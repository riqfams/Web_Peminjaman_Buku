<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'buku';
    protected $fillable = ['judul', 'image', 'penulis', 'penerbit', 'tahunTerbit', 'slug'];

    public function anggota()
    {
        return $this->belongsToMany(Anggota::class, 'peminjaman_buku', 'idAnggota', 'idBuku');
    }

}
