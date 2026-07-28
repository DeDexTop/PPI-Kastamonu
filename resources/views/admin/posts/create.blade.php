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
        max-width: 700px;
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
        min-height: 120px;
    }

    input[type="file"] {
        font-size: 14px;
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

    .divider {
        margin: 24px 0;
        border-top: 1px dashed #e5e7eb;
    }
</style>

<div class="page-title">➕ Tambah Post</div>

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
        action="{{ route('admin.posts.store') }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf

        {{-- POST --}}
        <div class="form-group">
            <label>Judul Post</label>
            <input 
                type="text" 
                name="title" 
                value="{{ old('title') }}"
                placeholder="Masukkan judul post"
            >
        </div>

        <div class="form-group">
            <label>Thumbnail Post</label>
            <input type="file" name="thumbnail">
        </div>

        <div class="form-group">
            <label>Isi Post</label>
            <textarea 
                name="content" 
                placeholder="Masukkan isi post"
            >{{ old('content') }}</textarea>
        </div>

        <div class="divider"></div>

        {{-- AUTHOR --}}
        <div class="form-group">
            <label>Pilih Author</label>
            <select name="author_id" id="authorSelect">
                <option value="">+ Buat Author Baru</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="newAuthorForm">
            <div class="form-group">
                <label>Nama Author</label>
                <input 
                    type="text" 
                    name="author_name" 
                    placeholder="Masukkan nama author"
                >
            </div>

            <div class="form-group">
                <label>Nama Pena (Pen Name)</label>
                <input 
                    type="text" 
                    name="pen_name" 
                    placeholder="Nama pena author"
                >
            </div>
            <div class="form-group">
                <label>Bio</label>
                <textarea name="bio" placeholder="Masukkan bio author">{{ old('bio') }}</textarea>
            </div>
            </div>
            <div class="form-group">
                <label>Foto Author</label>
                <input type="file" name="author_photo">
            </div>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>

<script>
    const authorSelect = document.getElementById('authorSelect');
    const newAuthorForm = document.getElementById('newAuthorForm');

    authorSelect.addEventListener('change', function () {
        newAuthorForm.style.display = this.value ? 'none' : 'block';
    });
</script>
@endsection
