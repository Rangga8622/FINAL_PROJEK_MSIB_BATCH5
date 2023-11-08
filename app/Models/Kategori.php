<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = ['nama'];
    public $timestamps = false;
    public function organisasi(): HasMany
    {
        return $this->hasMany(Organisasi::class);
    }
}
