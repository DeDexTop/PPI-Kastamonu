@extends('admin.layout.main')

@section('containers')

<style>
.page-title{
    font-size:24px;
    font-weight:600;
    margin-bottom:20px;
}

.card{
    background:#fff;
    padding:24px;
    border-radius:12px;
    box-shadow:0 10px 20px rgba(0,0,0,.06);
    max-width:700px;
}

.form-group{
    margin-bottom:18px;
}

label{
    font-weight:600;
    display:block;
    margin-bottom:6px;
}

input[type=text],
textarea{
    width:100%;
    border:1px solid #d1d5db;
    border-radius:8px;
    padding:10px 12px;
}

textarea{
    min-height:130px;
}

.btn-group{
    display:flex;
    gap:10px;
    margin-top:20px;
}

.btn{
    border:none;
    border-radius:8px;
    padding:10px 18px;
    cursor:pointer;
    text-decoration:none;
}

.btn-primary{
    background:#2563eb;
    color:white;
}

.btn-secondary{
    background:#6b7280;
    color:white;
}

.author-photo{
    width:120px;
    height:120px;
    object-fit:cover;
    border-radius:10%;
    margin-bottom:15px;
    border:3px solid #eee;
}

.error-box{
    background:#fee2e2;
    color:#991b1b;
    padding:12px;
    border-radius:8px;
    margin-bottom:16px;
}
</style>

<div class="page-title">
    ✏ Edit Penulis
</div>

<div class="card">

    @if ($errors->any())
        <div class="error-box">
            <ul style="margin:0;padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.posts.update_author',$author->id) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Asli</label>
            <input
                type="text"
                name="name"
                value="{{ old('name',$author->name) }}">
        </div>

        <div class="form-group">
            <label>Nama Pena</label>
            <input
                type="text"
                name="pen_name"
                value="{{ old('pen_name',$author->pen_name) }}">
        </div>

        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio">{{ old('bio',$author->bio) }}</textarea>
        </div>

        <div class="form-group">

            <label>Foto Penulis</label>

            @if($author->photo)
                <br>
                <img
                    src="{{ asset('storage/'.$author->photo) }}"
                    class="author-photo">
            @endif

            <input type="file" name="photo">

            <small class="text-muted">
                Kosongkan jika tidak ingin mengganti foto.
            </small>

        </div>

        <div class="btn-group">

            <button class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a
                href="{{ route('admin.posts.index_author') }}"
                class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection
