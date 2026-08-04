<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperDivision
 */
class Division extends Model
{
    protected $fillable = ['cabinet_id', 'name', 'sort_order'];

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class)
                    ->orderBy('sort_order')
                    ->orderBy('position_id');
    }

    public function orderedMembers()
    {
        return $this->members()
                    ->with('position')
                    ->join('positions','positions.id','=','members.position_id')
                    ->orderBy('positions.sort_order')
                    ->select('members.*');
    }
}

