<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    protected $fillable = ['cabinet_id', 'name'];

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}

