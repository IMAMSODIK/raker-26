<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peserta extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function unitKerja(): BelongsTo{
        return $this->belongsTo(UnitKerja::class);
    }

    public function jabatan(): BelongsTo{
        return $this->belongsTo(Jabatan::class);
    }

    public function kamar(): BelongsTo{
        return $this->belongsTo(Kamar::class);
    }
}
