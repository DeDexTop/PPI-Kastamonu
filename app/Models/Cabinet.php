<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    protected $fillable = [
        'name',
        'start_period',
        'end_period',
        'status'
    ];

    /**
     * Semua group pada kabinet
     */
    public function groups()
    {
        return $this->hasMany(CabinetGroup::class)
            ->with([
                'members.position'
            ])
            ->orderBy('sort_order');
    }

    /**
     * Semua anggota kabinet
     */
    public function members()
    {
        return $this->hasMany(Member::class)
            ->with('position')
            ->orderBy('sort_order');
    }

    /**
     * Group aktif beserta anggotanya
     */
    public function groupedMembers()
    {
        return $this->groups()
            ->whereHas('members')
            ->with([
                'members' => function ($query) {
                    $query->with('position')
                        ->orderBy('sort_order')
                        ->orderBy('position_id');
                }
            ]);
    }
}