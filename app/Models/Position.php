<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'name',
        'level',
    ];

    protected $casts = [
        'level' => 'integer',
    ];

    /**
     * Semua anggota dengan jabatan ini
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}