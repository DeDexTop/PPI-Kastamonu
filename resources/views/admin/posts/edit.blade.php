@extends('admin.layout.main')

@section('containers')
<style>
    .page-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .card {
        background: #fff;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.06);
        max-width: 800px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
    }

    input[type="text"],
    textarea,
    select {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        font-size: 14px;
    }

    textarea {
        resize: vertical;
        min-height: 150px;
    }

    .thumb-preview {
        width: 160px;
        border-radius: 10px;
        margin-bottom: 10px;
        border: 1px solid #e5e7eb;
    }

    .btn {
        padding: 10px 16px;
        border-radius: 8px;
        border: none;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-primary {
        background: #2563eb;
        color: #fff;
    }

    .btn-secondary {
        background: #6b7280;
        color: #fff;
    }

    .btn-group {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .error-box {
        background: #fee2e2;
        color: #991b1b;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 16px;
    }
</style>

<div class="page-title">✏️ Edit Post</div>

<div class="card">

    {{-- Validation Error --}}
    @if ($errors->any())
        <div class="error-box">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form 
        action="{{ route('admin.posts.update', $post->id) }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        {{-- JUDUL --}}
        <div class="form-group">
            <label>Judul Post</label>
            <input 
                type="text" 
                name="title"
                value="{{ old('title', $post->title) }}"
            >
        </div>

        {{-- AUTHOR --}}
        <div class="form-group">
            <label>Author</label>
            <select name="author_id">
                @foreach ($authors as $author)
                    <option 
                        value="{{ $author->id }}"
                        {{ $author->id == $post->author_id ? 'selected' : '' }}
                    >
                        {{ $author->pen_name ?? $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- THUMBNAIL --}}
        <div class="form-group">
            <label>Thumbnail Saat Ini</label><br>
            <img 
                src="{{ asset('storage/'.$post->thumbnail) }}" 
                class="thumb-preview"
            >
        </div>

        <div class="form-group">
            <label>Ganti Thumbnail (opsional)</label>
            <input type="file" name="thumbnail">
        </div>

        {{-- KONTEN --}}
        <div class="form-group">
            <label>Isi Post</label>
            <textarea name="content">{{ old('content', $post->content) }}</textarea>
        </div>

        {{-- BUTTON --}}
        <div class="btn-group">
            <button type="submit" class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>
</div>
@endsection
