<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ktp extends Model
{
    use HasFactory;

    protected $table = 'ktp';
    protected $fillable = ['anggota_id', 'nik'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'nik_id');
    }
}
