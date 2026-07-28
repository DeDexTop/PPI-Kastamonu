<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * ==========================
     * POST
     * ==========================
     */

    public function index()
    {
        $posts = Post::with('author')->latest()->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $authors = Author::all();

        return view('admin.posts.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|max:255',
            'content'       => 'required',
            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png|max:500',

            'author_id'     => 'nullable|exists:authors,id',
            'author_name'   => 'required_without:author_id|max:255',
            'pen_name'      => 'nullable|max:255',
            'bio'           => 'nullable',
            'author_photo'  => 'nullable|image|mimes:jpg,jpeg,png|max:500',
        ],[
            'thumbnail.max' => 'Thumbnail maksimal 500KB.',
            'author_photo.max' => 'Foto penulis maksimal 500KB.',
        ]);

        if ($request->author_id) {

            $authorId = $request->author_id;

        } else {

            $author = Author::create([
                'name' => $request->author_name,
                'pen_name' => $request->pen_name,
                'bio' => $request->bio,
                'photo' => $request->hasFile('author_photo')
                    ? $request->file('author_photo')->store('authors', 'public')
                    : null,
            ]);

            $authorId = $author->id;
        }

        Post::create([
            'author_id' => $authorId,
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $request->hasFile('thumbnail')
                ? $request->file('thumbnail')->store('posts', 'public')
                : null,
        ]);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        $authors = Author::all();

        return view('admin.posts.edit', compact('post', 'authors'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author_id' => 'required|exists:authors,id',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:500',
        ],[
            'thumbnail.max' => 'Thumbnail maksimal 500KB.',
        ]);

        if ($request->hasFile('thumbnail')) {

            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')
                ->store('posts', 'public');
        }

        $post->update($data);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return back()->with('success', 'Post berhasil dihapus.');
    }

    /**
     * ==========================
     * AUTHOR
     * ==========================
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
        $request->validate([
            'name' => 'required|max:255',
            'pen_name' => 'nullable|max:255',
            //'bio' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:500',
        ],[
            'photo.image' => 'File harus berupa gambar.',
            'photo.max' => 'Ukuran foto maksimal 500KB.',
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')
                ->store('authors', 'public');
        }

        Author::create([
            'name' => $request->name,
            'pen_name' => $request->pen_name,
            //'bio' => $request->bio,
            'photo' => $photo,
        ]);

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
        $request->validate([
            'name' => 'required|max:255',
            'pen_name' => 'nullable|max:255',
            //'bio' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:500',
        ],[
            'photo.image' => 'File harus berupa gambar.',
            'photo.max' => 'Ukuran foto maksimal 500KB.',
        ]);

        $photo = $author->photo;

        if ($request->hasFile('photo')) {

            if ($author->photo) {
                Storage::disk('public')->delete($author->photo);
            }

            $photo = $request->file('photo')
                ->store('authors', 'public');
        }

        $author->update([
            'name' => $request->name,
            'pen_name' => $request->pen_name,
            //'bio' => $request->bio,
            'photo' => $photo,
        ]);

        return redirect()
            ->route('admin.posts.index_author')
            ->with('success', 'Penulis berhasil diperbarui.');
    }

    public function destroyAuthor(Author $author)
    {
        // Hapus semua post beserta thumbnail
        foreach ($author->posts as $post) {

            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            $post->delete();
        }

        // Hapus foto author
        if ($author->photo) {
            Storage::disk('public')->delete($author->photo);
        }

        // Hapus author
        $author->delete();

        return redirect()
            ->route('admin.posts.index_author')
            ->with('success', 'Penulis beserta seluruh tulisannya berhasil dihapus.');
    }

    /**
     * ==========================
     * USER
     * ==========================
     */

    public function show(Post $post)
    {
        $post->load('author');

        $title = "PPI Kastamonu - Kastulis - {$post->title}";

        return view('user.kastulis_detail', compact('post', 'title'));
    }

    public function listPosts(Request $request)
    {
        $search = $request->query('search');
        $title = 'PPI Kastamonu - Kastulis';

        $posts = Post::with('author')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('user.kastulis', compact(
            'posts',
            'search',
            'title'
        ));
    }

    public function profile(Author $author)
    {
        $author->load('posts');

        $title = $author->pen_name ?? $author->name;

        return view('user.author', compact(
            'author',
            'title'
        ));
    }
}