<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN - POST
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $posts = Post::with('author')->latest()->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $authors = Author::orderBy('name')->get();

        if ($authors->isEmpty()) {
            return redirect()
                ->route('admin.posts.index_author')
                ->with('error', 'Tambahkan minimal satu penulis terlebih dahulu.');
        }

        return view('admin.posts.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|max:255',
            'content'    => 'required',
            'author_id'  => 'required|exists:authors,id',
            'thumbnail'  => 'required|image|mimes:jpg,jpeg,png|max:500',
        ], [
            'title.required'      => 'Judul tulisan wajib diisi.',
            'title.max'           => 'Judul maksimal 255 karakter.',

            'content.required'    => 'Isi tulisan wajib diisi.',

            'author_id.required'  => 'Silakan pilih penulis.',
            'author_id.exists'    => 'Penulis tidak ditemukan.',

            'thumbnail.required'  => 'Thumbnail wajib diunggah.',
            'thumbnail.image'     => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes'     => 'Thumbnail harus berformat JPG, JPEG, atau PNG.',
            'thumbnail.max'       => 'Ukuran thumbnail maksimal 500 KB.',
        ]);

        $validated['thumbnail'] = $request
            ->file('thumbnail')
            ->store('posts', 'public');

        Post::create($validated);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Tulisan berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        $authors = Author::orderBy('name')->get();

        return view('admin.posts.edit', compact('post', 'authors'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'      => 'required|max:255',
            'content'    => 'required',
            'author_id'  => 'required|exists:authors,id',
            'thumbnail'  => 'nullable|image|mimes:jpg,jpeg,png|max:500',
        ], [
            'title.required'      => 'Judul tulisan wajib diisi.',
            'title.max'           => 'Judul maksimal 255 karakter.',

            'content.required'    => 'Isi tulisan wajib diisi.',

            'author_id.required'  => 'Silakan pilih penulis.',
            'author_id.exists'    => 'Penulis tidak ditemukan.',

            'thumbnail.image'     => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes'     => 'Thumbnail harus berformat JPG, JPEG, atau PNG.',
            'thumbnail.max'       => 'Ukuran thumbnail maksimal 500 KB.',
        ]);

        if ($request->hasFile('thumbnail')) {

            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Tulisan berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return back()->with('success', 'Tulisan berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN - AUTHOR
    |--------------------------------------------------------------------------
    */

    public function indexAuthor()
    {
        $authors = Author::latest()->get();

        return view('admin.posts.index_author', compact('authors'));
    }

    public function createAuthor()
    {
        return view('admin.posts.create_author');
    }

    public function storeAuthor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'pen_name' => 'nullable|max:255',
            'bio' => 'nullable',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ], [
            'name.required' => 'Nama penulis wajib diisi.',

            'photo.required' => 'Foto penulis wajib diunggah.',
            'photo.image' => 'Foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
            'photo.max' => 'Ukuran foto maksimal 1 MB.',
        ]);

        $validated['photo'] = $request
            ->file('photo')
            ->store('authors', 'public');

        Author::create($validated);

        return redirect()
            ->route('admin.posts.index_author')
            ->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function editAuthor(Author $author)
    {
        return view('admin.posts.edit_author', compact('author'));
    }

    public function updateAuthor(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'pen_name' => 'nullable|max:255',
            'bio' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ], [
            'name.required' => 'Nama penulis wajib diisi.',

            'photo.image' => 'Foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus berformat JPG, JPEG, atau PNG.',
            'photo.max' => 'Ukuran foto maksimal 1 MB.',
        ]);

        if ($request->hasFile('photo')) {

            if ($author->photo) {
                Storage::disk('public')->delete($author->photo);
            }

            $validated['photo'] = $request
                ->file('photo')
                ->store('authors', 'public');
        }

        $author->update($validated);

        return redirect()
            ->route('admin.posts.index_author')
            ->with('success', 'Penulis berhasil diperbarui.');
    }

    public function destroyAuthor(Author $author)
    {
        foreach ($author->posts as $post) {

            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            $post->delete();
        }

        if ($author->photo) {
            Storage::disk('public')->delete($author->photo);
        }

        $author->delete();

        return redirect()
            ->route('admin.posts.index_author')
            ->with('success', 'Penulis beserta seluruh tulisannya berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    public function listPosts(Request $request)
    {
        $search = $request->search;

        $posts = Post::with('author')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        $title = 'PPI Kastamonu - Kastulis';

        return view('user.kastulis', compact(
            'posts',
            'search',
            'title'
        ));
    }

    public function show(Post $post)
    {
        $post->load('author');

        $title = "PPI Kastamonu - Kastulis - {$post->title}";

        return view('user.kastulis_detail', compact(
            'post',
            'title'
        ));
    }

    public function profile(Author $author)
    {
        $author->load('posts');

        $title = "PPI Kastamonu - Author - {$author->pen_name}";

        return view('user.author', compact(
            'author',
            'title'
        ));
    }
}