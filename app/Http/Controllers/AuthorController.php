<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
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
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'image|nullable',

            'author_id' => 'nullable|exists:authors,id',
            'author_name' => 'required_without:author_id',
            'pen_name' => 'nullable|string',
            'author_photo' => 'image|nullable',
        ]);

        if ($request->author_id) {
            $authorId = $request->author_id;
        } else {
            $author = Author::create([
            'name' => $request->author_name,
            'pen_name' => $request->pen_name,
            'photo' => $request->file('author_photo')
                ? $request->file('author_photo')->store('authors', 'public')
                : null,
            ]);

            $authorId = $author->id;
        }

        Post::create([
            'author_id' => $authorId,
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $request->file('thumbnail')
                ? $request->file('thumbnail')->store('posts', 'public')
                : null,
        ]);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post berhasil ditambahkan');
    }

    public function show(Post $post)
    {
        return view('user.kastulis_detail', [
            'post' => Post::with('author')->findOrFail($post->id),
            'title' => "PPI Kastamonu - kastulis - {$post->title}",
        ]);
    }

    public function listPosts(Request $request)
    {
        $search = $request->query('search');
        $title = 'PPI Kastamonu -  kastulis';  

        $posts = Post::with('author')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5) 
            ->withQueryString(); 

        return view('user.kastulis', compact('posts', 'search', 'title'));
    }

    public function edit(Post $post)
    {
        $authors = Author::all();
        return view('admin.posts.edit', compact('post', 'authors'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'author_id' => 'required'
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                ->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
