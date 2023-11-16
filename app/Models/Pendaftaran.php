<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = [
        'idmahasiswa', 'idorganisasi', 'tanggal_pendaftaran', 'status_pendaftaran', 'keterangan'
    ];
    public $timestamps = false;
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'idmahasiswa');
    }
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'idorganisasi');
    }
}