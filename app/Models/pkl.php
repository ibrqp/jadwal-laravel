<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pkl extends Model
{
    use HasFactory;
    protected $fillable = ['tgl_masuk', 'tgl_keluar', 'id_siswa', 'id_dudi'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }

    public function dudi(){
        return $this->belongsTo(Dudi::class, 'id_dudi', 'id');
    }
}
