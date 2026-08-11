<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Menampilkan semua blog
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blog.index', compact('blogs'));
    }

    public function indexUser(Request $request)
    {
        $title = 'PPI Kastamonu - Blog';
        $search = $request->search;

        $blogs = Blog::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();


        return view('user.blog', compact('blogs', 'search', 'title'));
    }

   
    public function create()
    {
        return view('admin.blog.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title'      => ['required', 'max:255'],
            'content'    => ['required'],

            'thumbnail'  => [
                'nullable',
                File::image()->max(500),
            ],

            'images'     => ['nullable', 'array'],
            'images.*'   => [
                File::image()->max(1024),
            ],

        ], [
            'title.required'       => 'Judul wajib diisi.',
            'content.required'     => 'Konten wajib diisi.',

            'thumbnail.image'      => 'Thumbnail harus berupa gambar.',
            'thumbnail.max'        => 'Ukuran thumbnail maksimal 500 KB.',

            'images.array'         => 'Format gambar tidak valid.',
            'images.*.image'       => 'Setiap file harus berupa gambar.',
            'images.*.max'         => 'Setiap gambar maksimal 1 MB.',
        ]);

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')
                ->store('blogs', 'public');
        }

        $blog = Blog::create([
            'title'     => $request->title,
            'content'   => $request->content,
            'thumbnail' => $thumbnail,
        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store('blogs', 'public');

                BlogImage::create([
                    'blog_id'    => $blog->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog berhasil ditambahkan.');
    }


    public function show(Blog $blog)
    {
        $blog->load('images');

        $title = "PPI Kastamonu - Blog - {$blog->title}";

        return view('user.blog_detail', compact('blog', 'title'));
    }


    public function edit(Blog $blog)
    {
        $blog->load('images');

        return view('admin.blog.edit', compact('blog'));
    }


    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'      => ['required', 'max:255'],
            'content'    => ['required'],

            'thumbnail'  => [
                'nullable',
                File::image()->max(500),
            ],

            'images'     => ['nullable', 'array'],
            'images.*'   => [
                File::image()->max(1024),
            ],

        ], [
            'title.required'       => 'Judul wajib diisi.',
            'content.required'     => 'Konten wajib diisi.',

            'thumbnail.image'      => 'Thumbnail harus berupa gambar.',
            'thumbnail.max'        => 'Ukuran thumbnail maksimal 500 KB.',

            'images.array'         => 'Format gambar tidak valid.',
            'images.*.image'       => 'Setiap file harus berupa gambar.',
            'images.*.max'         => 'Setiap gambar maksimal 1 MB.',
        ]);

        $thumbnail = $blog->thumbnail;

        if ($request->hasFile('thumbnail')) {

            if ($blog->thumbnail) {
                Storage::disk('public')->delete($blog->thumbnail);
            }

            $thumbnail = $request->file('thumbnail')
                ->store('blogs', 'public');
        }

        $blog->update([
            'title'     => $request->title,
            'content'   => $request->content,
            'thumbnail' => $thumbnail,
        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store('blogs', 'public');

                BlogImage::create([
                    'blog_id'    => $blog->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->thumbnail) {
            $cleanThumbnailPath = Str::replace('storage/', '', $blog->thumbnail);

            if (Storage::disk('public')->exists($cleanThumbnailPath)) {
                Storage::disk('public')->delete($cleanThumbnailPath);
            }
        }

        if ($blog->images) {
            foreach ($blog->images as $img) {
                if ($img->image_path) {
                    $cleanImagePath = Str::replace('storage/', '', $img->image_path);

                    if (Storage::disk('public')->exists($cleanImagePath)) {
                        Storage::disk('public')->delete($cleanImagePath);
                    }
                }
                $img->delete();
            }
        }

        $blog->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog dan semua berkas gambar berhasil dihapus.');
    }
}
