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
    textarea {
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
</style>

<div class="page-title">➕ Tambah Activitas</div>

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
        action="{{ route('admin.blog.store') }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf

        <div class="form-group">
            <label>Nama Blog</label>
            <input 
                type="text" 
                name="title" 
                value="{{ old('title') }}"
                placeholder="Masukkan nama blog"
            >
        </div>

        <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail">
        </div>

        <div class="form-group">
            <label>Content</label>
            <textarea 
                name="content" 
                placeholder="Masukkan content blog"
            >{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label>Gambar Blog (boleh lebih dari satu)</label>
            <input type="file" name="images[]" multiple>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('admin.activity.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
