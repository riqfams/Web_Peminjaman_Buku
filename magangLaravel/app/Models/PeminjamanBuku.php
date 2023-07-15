<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeminjamanBuku extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'peminjaman_buku';
    protected $fillable = ['idAnggota', 'idBuku', 'tanggalPinjam', 'tanggalKembali'];

    /*
    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'peminjaman_buku', 'idAnggota', 'idBuku');
    }

    public function anggota()
    {
        return $this->belongsToMany(Anggota::class, 'peminjaman_buku', 'idAnggota', 'idBuku');
    }
    */
    
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'idAnggota');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'idBuku');
    }


}
