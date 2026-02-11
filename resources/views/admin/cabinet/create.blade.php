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
        max-width: 600px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
    }

    input, select {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
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

<div class="page-title">➕ Tambah Kabinet</div>

<div class="card">

    @if ($errors->any())
        <div class="error-box">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.cabinets.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Nama Kabinet</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Kabinet Harmoni">
    </div>

    <div class="form-group">
        <label>Tahun Mulai</label>
        <input type="number" name="start_period" value="{{ old('start_period') }}" placeholder="2024" min="1900" max="2100">
    </div>

    <div class="form-group">
        <label>Tahun Selesai</label>
        <input type="number" name="end_period" value="{{ old('end_period') }}" placeholder="2025" min="1900" max="2100">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status">
            <option value="inactive">Tidak Aktif</option>
            <option value="active">Aktif</option>
        </select>
    </div>

    <div class="btn-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.cabinets.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
</form>
</div>
@endsection
