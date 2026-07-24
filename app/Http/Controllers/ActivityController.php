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
        $activities = Activity::with('images')->latest()->get();

        return view('admin.activity.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.activity.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required',
            'thumbnail'   => 'required|image|mimes:jpg,jpeg,png,webp|max:500',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ], [
            'thumbnail.required' => 'Thumbnail wajib diupload.',
            'thumbnail.image'    => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes'    => 'Format thumbnail harus JPG, JPEG, PNG, atau WEBP.',
            'thumbnail.max'      => 'Ukuran thumbnail maksimal 500 KB.',

            'images.*.image' => 'File harus berupa gambar.',
            'images.*.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'images.*.max'   => 'Ukuran setiap gambar maksimal 1 MB.',
        ]);

        // Upload Thumbnail
        $thumbnailPath = $request->file('thumbnail')
            ->store('activities', 'public');

        // Simpan Activity
        $activity = Activity::create([
            'nama'       => $request->nama,
            'thumbnail'  => $thumbnailPath,
            'deskripsi'  => $request->deskripsi,
        ]);

        // Upload banyak gambar
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $path = $image->store('activities', 'public');

                $activity->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.activity.index')
            ->with('success', 'Aktivitas berhasil ditambahkan.');
    }

    public function show(Activity $activity)
    {
        $activity->load('images');

        $title = "Aktivitas - {$activity->nama}";

        return view('user.activity_detail', compact('activity', 'title'));
    }

    public function edit(Activity $activity)
    {
        $activity->load('images');

        return view('admin.activity.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'deskripsi'   => 'required',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:500',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ], [
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Format thumbnail harus JPG, JPEG, PNG, atau WEBP.',
            'thumbnail.max'   => 'Ukuran thumbnail maksimal 500 KB.',

            'images.*.image' => 'File harus berupa gambar.',
            'images.*.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'images.*.max'   => 'Ukuran setiap gambar maksimal 1 MB.',
        ]);

        $data = [
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
        ];

        // Upload thumbnail baru
        if ($request->hasFile('thumbnail')) {

            if ($activity->thumbnail && Storage::disk('public')->exists($activity->thumbnail)) {
                Storage::disk('public')->delete($activity->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')
                ->store('activities', 'public');
        }

        $activity->update($data);

        // Upload gambar baru
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store('activities', 'public');

                $activity->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.activity.index')
            ->with('success', 'Aktivitas berhasil diperbarui.');
    }

    public function destroy(Activity $activity)
    {
        // Hapus thumbnail
        if ($activity->thumbnail && Storage::disk('public')->exists($activity->thumbnail)) {
            Storage::disk('public')->delete($activity->thumbnail);
        }

        // Hapus seluruh gambar
        foreach ($activity->images as $image) {

            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }

            $image->delete();
        }

        $activity->delete();

        return redirect()
            ->route('admin.activity.index')
            ->with('success', 'Aktivitas berhasil dihapus.');
    }
}