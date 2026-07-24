<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperActivityImage
 */
class ActivityImage extends Model
{
    protected $table = 'activity_images';

    protected $fillable = [
        'activity_id',
        'image_path',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
