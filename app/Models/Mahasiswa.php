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
        'idjurusan', 'nama', 'semester', 'gender', 'nohp', 'email',
        'cv', 'foto', 'barcode'
    ];
    public $timestamps = false;
    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
