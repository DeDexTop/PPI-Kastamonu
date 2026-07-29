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
        box-shadow: 0 10px 20px rgba(0,0,0,.06);
        max-width: 700px;
    }

    .form-group{
        margin-bottom:16px;
    }

    label{
        font-weight:600;
        display:block;
        margin-bottom:6px;
    }

    input[type="text"],
    textarea,
    select{
        width:100%;
        padding:10px 12px;
        border-radius:8px;
        border:1px solid #d1d5db;
        font-size:14px;
    }

    textarea{
        resize:vertical;
        min-height:150px;
    }

    input[type="file"]{
        font-size:14px;
    }

    .btn{
        padding:10px 16px;
        border:none;
        border-radius:8px;
        cursor:pointer;
        text-decoration:none;
        font-size:14px;
    }

    .btn-primary{
        background:#2563eb;
        color:#fff;
    }

    .btn-secondary{
        background:#6b7280;
        color:#fff;
    }

    .btn-success{
        background:#16a34a;
        color:#fff;
    }

    .btn-group{
        display:flex;
        gap:10px;
        margin-top:20px;
    }

    .error-box{
        background:#fee2e2;
        color:#991b1b;
        padding:12px;
        border-radius:8px;
        margin-bottom:16px;
    }

    .warning-box{
        background:#fef3c7;
        color:#92400e;
        border:1px solid #fde68a;
        padding:16px;
        border-radius:10px;
        margin-bottom:20px;
    }

    .warning-box p{
        margin-bottom:15px;
    }
</style>

<div class="page-title">
    ➕ Tambah Post
</div>

<div class="card">

    {{-- Error Validasi --}}
    @if ($errors->any())
        <div class="error-box">
            <ul style="margin:0;padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Jika belum ada author --}}
    @if($authors->count() == 0)

        <div class="warning-box">
            <h5>⚠ Belum Ada Penulis</h5>

            <p>
                Anda belum dapat menambahkan tulisan karena belum ada data penulis.
                Silakan tambahkan penulis terlebih dahulu.
            </p>

            <a href="{{ route('admin.posts.create_author') }}"
               class="btn btn-success">
                + Tambah Penulis
            </a>
        </div>

    @else

    <form
        action="{{ route('admin.posts.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label>Judul Post</label>
            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                placeholder="Masukkan judul post"
                required>
        </div>

        <div class="form-group">
            <label>Thumbnail</label>
            <input
                type="file"
                name="thumbnail">
        </div>

        <div class="form-group">
            <label>Isi Tulisan</label>
            <textarea
                name="content"
                placeholder="Masukkan isi tulisan"
                required>{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label>Author</label>

            <select name="author_id" required>
                <option value="">-- Pilih Penulis --</option>

                @foreach($authors as $author)
                    <option
                        value="{{ $author->id }}"
                        {{ old('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->pen_name ?? $author->name }}
                        ({{ $author->name }})
                    </option>
                @endforeach

            </select>
        </div>

        <div class="btn-group">

            <button
                type="submit"
                class="btn btn-primary">
                Simpan
            </button>

            <a
                href="{{ route('admin.posts.index') }}"
                class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

    @endif

</div>

@endsection