<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organisasi extends Model
{
    use HasFactory;
    protected $table = 'organisasi';
    protected $fillable = [
        'kode', 'nama', 'deskripsi', 'email', 'hp', 'idkategori'
    ];
    public $timestamps = false;
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idkategori');
    }

    public function pendaftaran(): HasMany
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
