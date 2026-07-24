<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCabinet
 */
class Cabinet extends Model
{
    protected $fillable = ['name', 'start_period', 'end_period', 'status'];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function coreMembers()
    {
        return $this->members()->whereHas('position', function($q){
            $q->where('type', 'core');
        });
    }

    public function mpaMembers()
    {
        return $this->members()->where('type', 'mpa');
    }
}




