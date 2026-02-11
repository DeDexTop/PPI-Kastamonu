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

    .thumbnail-preview {
        width: 160px;
        border-radius: 10px;
        margin-bottom: 10px;
        border: 1px solid #e5e7eb;
    }

    /* .gallery img {
        width: 100%;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 6px;
        margin-bottom: 6px;
        border: 1px solid #e5e7eb;
    } */

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
    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
    }

    .gallery-img {
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
    }
</style>

<div class="page-title">✏️ Edit Activity</div>

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
        action="{{ route('admin.activity.update', $activity->id) }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="form-group">
            <label>Nama Activity</label>
            <input 
                type="text" 
                name="nama" 
                value="{{ old('nama', $activity->nama) }}"
            >
        </div>

        {{-- Thumbnail --}}
        <div class="form-group">
            <label>Thumbnail Saat Ini</label><br>
            <img 
                src="{{ asset('storage/'.$activity->thumbnail) }}" 
                class="thumbnail-preview"
            >
        </div>

        <div class="form-group">
            <label>Ganti Thumbnail (opsional)</label>
            <input type="file" name="thumbnail">
        </div>

        {{-- Deskripsi --}}
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi">{{ old('deskripsi', $activity->deskripsi) }}</textarea>
        </div>

        {{-- Galeri Lama --}}
        <div class="form-group">
            <label>Gambar Aktivitas Saat Ini</label>

            <div class="gallery">
                @foreach ($activity->images as $img)
                    <img src="{{ asset('storage/'.$img->image_path) }}" class="gallery-img">
                @endforeach
            </div>
            <small class="text-muted">
                (Gambar lama tidak akan terhapus)
            </small>
        </div>

        {{-- Tambah Gambar Baru --}}
        <div class="form-group">
            <label>Tambah Gambar Baru</label>
            <input type="file" name="images[]" multiple>
        </div>

        {{-- BUTTON --}}
        <div class="btn-group">
            <button type="submit" class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('admin.activity.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>
</div>
@endsection
