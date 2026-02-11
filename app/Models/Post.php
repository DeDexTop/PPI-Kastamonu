<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [
        'author_id',
        'title',
        'content',
        'thumbnail'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
