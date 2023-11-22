<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'idjurusan', 'idorganisasi', 'nama', 'semester', 'gender', 'nohp', 'email', 'tanggal_pendaftaran',
        'cv', 'foto', 'barcode'
    ];
    public $timestamps = false;
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'idjurusan');
    }
    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class);
    }
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'idorganisasi');
    }

}
