<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityImage;
use App\Models\Activity;

class GalleryController extends Controller
{

    public function index()
    {
        $activities = Activity::with('images')
        ->orderBy('created_at', 'desc')
        ->get();
        $title = 'PPI Kastamonu -  Galeri Kegiatan';

        return view('user.gallery', compact('activities', 'title'));
    }
}
