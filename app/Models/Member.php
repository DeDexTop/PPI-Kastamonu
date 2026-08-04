<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'cabinet_id',
        'cabinet_group_id',
        'position_id',
        'sort_order',
        'name',
        'photo',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    /**
     * Relasi ke kabinet
     */
    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class);
    }

    /**
     * Relasi ke group kabinet
     */
    public function group()
    {
        return $this->belongsTo(CabinetGroup::class, 'cabinet_group_id');
    }

    /**
     * Relasi ke jabatan
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Scope urutan anggota
     */
    public function scopeOrdered($query)
    {
        return $query
            ->orderBy('sort_order')
            ->orderBy('position_id')
            ->orderBy('name');
    }
}