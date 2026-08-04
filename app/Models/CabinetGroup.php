<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabinetGroup extends Model
{
    protected $fillable = [
        'cabinet_id',
        'name',
        'description',
        'sort_order'
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
     * Semua anggota pada group ini
     */
    public function members()
    {
        return $this->hasMany(Member::class, 'cabinet_group_id')
            ->with('position')
            ->orderBy('sort_order')
            ->orderBy('position_id')
            ->orderBy('name');
    }
}