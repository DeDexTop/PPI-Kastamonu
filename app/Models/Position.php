<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPosition
 */
class Position extends Model
{
    protected $fillable = ['name'];
    
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
