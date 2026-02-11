@extends('admin.layout.main')

@section('containers')
<style>
    .page-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .card-form {
        background: #fff;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        max-width: 600px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
    }
    input {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        font-size: 14px;
    }
    .btn {
        padding: 10px 18px;
        border-radius: 8px;
        border: none;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-primary { background:#2563eb; color:#fff; }
    .btn-secondary { background:#6b7280; color:#fff; }
</style>

<div class="page-title">➕ Tambah Divisi</div>

<div class="card-form">
    <form action="{{ route('admin.divisions.store', $cabinet->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Divisi</label>
            <input type="text" name="name" placeholder="Contoh: Divisi Media" required>
        </div>

        <div style="margin-top:20px; display:flex; gap:10px;">
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.cabinets.show', $cabinet->id) }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
