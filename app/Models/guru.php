<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'no_hp', 'foto'];

    public function pengajar()
    {
        return $this->hasMany(pengajar::class, 'id');
    }
}
