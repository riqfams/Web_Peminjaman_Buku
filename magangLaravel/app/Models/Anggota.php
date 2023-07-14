<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'anggota';
    protected $fillable = ['nama', 'kelamin', 'nim', 'prodi_id', 'alamat'];
   
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'peminjaman_buku', 'idAnggota', 'idBuku');
    }

}
