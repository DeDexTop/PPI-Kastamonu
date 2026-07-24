<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Activity;

class GalleryController extends Controller
{

    public function index()
    {
        $activities = Activity::with('images')
            ->latest()
            ->get();

        $blogs = Blog::with('images')
            ->latest()
            ->get();

        $title = 'PPI Kastamonu - Galeri';

        return view('user.gallery', compact(
            'activities',
            'blogs',
            'title'
        ));
    }
}
