<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        // INI SUDAH BENAR
        $activities = Activity::with('images')->get();
        return view('admin.activity.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.activity.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required',
        'thumbnail' => 'required|image',
        'deskripsi' => 'required',
        'images.*' => 'image'
    ]);

    // simpan thumbnail
    $thumbnailPath = $request->file('thumbnail')
        ->store('activities', 'public');

    // simpan activity
    $activity = Activity::create([
        'nama' => $request->nama,
        'thumbnail' => $thumbnailPath,
        'deskripsi' => $request->deskripsi,
    ]);

    // simpan multiple images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('activities', 'public');

            $activity->images()->create([
                'image_path' => $path
            ]);
        }
    }

    return redirect()->route('admin.activity.index');
    }

    public function show(Activity $activity)
    {
        $activity->load('images'); 
        $title = "Aktivitas - kegiatan - {$activity->nama}";

        return view('user.activity_detail', compact('activity', 'title'));
    }

    public function edit(Activity $activity)
    {
        
        $activity->load('images');
        return view('admin.activity.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'image|nullable',
            'images.*' => 'image|nullable',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                ->store('activities', 'public');
        }

        $activity->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $activity->images()->create([
                    'image' => $img->store('activity-images', 'public')
                ]);
            }
        }

        return redirect()
            ->route('admin.activity.index')
            ->with('success', 'Activity berhasil diperbarui');
    }


    public function destroy(Activity $activity, ActivityImage $activityImage)
    {

        if ($activity->thumbnail) {
            Storage::disk('public')->delete($activity->thumbnail);
        }
        foreach ($activityImage->where('activity_id', $activity->id)->get() as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
        $activity->delete(); 
        return redirect()->route('admin.activity.index');
    }
}

