<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperActivity
 */
class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = [
        'nama',
        'thumbnail',
        'deskripsi',
    ];

    public function images()
    {
        return $this->hasMany(ActivityImage::class, 'activity_id');
    }
}
