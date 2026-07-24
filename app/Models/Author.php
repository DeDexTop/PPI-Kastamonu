<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperAuthor
 */
class Author extends Model
{
     protected $fillable = ['name', 'photo', 'pen_name'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
