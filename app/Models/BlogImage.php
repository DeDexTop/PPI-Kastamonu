<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperBlogImage
 */
class BlogImage extends Model
{
    protected $table = 'blog_images';

    protected $fillable = [
        'blog_id',
        'image_path',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
