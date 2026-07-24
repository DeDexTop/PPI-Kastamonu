<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'thumbnail',
        'content',
    ];

    public function images()
    {
        return $this->hasMany(BlogImage::class, 'blog_id');
    }
}
