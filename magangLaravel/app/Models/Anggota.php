<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = 'anggota';
    protected $fillable = ['nama', 'kelamin', 'nim', 'nik_id', 'prodi_id', 'alamat', 'slug'];


    public function ktp()
    {
        return $this->hasOne(Ktp::class);
    }
    
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'peminjaman_buku', 'idAnggota', 'idBuku');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'   
            ]
        ];
    }

}
