<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

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

    /**
     * Form tambah blog
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Simpan blog
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => ['required', 'max:255'],
            'content'    => ['required'],

            // Thumbnail maksimal 500KB
            'thumbnail'  => [
                'nullable',
                File::image()->max(500),
            ],

            // Setiap gambar maksimal 1MB
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

        // Upload banyak gambar
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

    /**
     * Detail blog
     */
    public function show(Blog $blog)
    {
        $blog->load('images');

        $title = "Blog - {$blog->title}";

        return view('user.blog_detail', compact('blog', 'title'));
    }

    /**
     * Form edit blog
     */
    public function edit(Blog $blog)
    {
        $blog->load('images');

        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update blog
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'      => ['required', 'max:255'],
            'content'    => ['required'],

            // Thumbnail maksimal 500KB
            'thumbnail'  => [
                'nullable',
                File::image()->max(500),
            ],

            // Tambahan gambar maksimal 1MB
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

        // Tambah gambar baru
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

    /**
     * Hapus blog
     */
    public function destroy(Blog $blog)
    {
        if ($blog->thumbnail) {
            Storage::disk('public')->delete($blog->thumbnail);
        }

        foreach ($blog->images as $img) {

            Storage::disk('public')->delete($img->image_path);

            $img->delete();
        }

        $blog->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog berhasil dihapus.');
    }
}