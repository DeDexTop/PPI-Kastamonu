<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Activity;
use App\Models\Post;
use App\Models\ActivityImage;
use App\Models\Member;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalCabinets' => Cabinet::count(),
            'activeCabinet' => Cabinet::where('status', 'active')->first(),
            'totalActivities' => Activity::count(),
            'totalPosts' => Post::count(),
            'totalImages' => ActivityImage::count(),
            'recentMembers' => Member::latest()->take(5)->get(),
            'title' => 'PPI Kastamonu - Dashboard',
        ]);
    }
}
