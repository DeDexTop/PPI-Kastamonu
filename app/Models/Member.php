<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperMember
 */
class Member extends Model
{
    protected $fillable = [
        'cabinet_id',
        'division_id',
        'position_id',
        'name',
        'photo',
        'type'
    ];

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function scopeOrderByPosition($query)
    {
        return $query->orderByRaw("
            CASE 
                WHEN positions.name LIKE '%Ketua%' THEN 1
                WHEN positions.name LIKE '%Wakil%' THEN 2
                WHEN positions.name LIKE '%Sekre%' THEN 3
                WHEN positions.name LIKE '%Bendahara%' THEN 4
                ELSE 5
            END
        ");
    }
}
