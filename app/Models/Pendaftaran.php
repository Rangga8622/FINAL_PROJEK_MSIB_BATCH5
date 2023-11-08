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
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function organisasi(): BelongsTo
    {
        return $this->belongsTo(Organisasi::class);
    }
}
