@extends('admin.layout.main')

@section('containers')
<style>
    .page-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .card-form {
        background:#fff;
        padding:25px;
        border-radius:14px;
        box-shadow:0 10px 25px rgba(0,0,0,0.08);
        max-width:720px;
    }
    .form-group { margin-bottom:15px; }
    label { font-weight:600; margin-bottom:6px; display:block; }
    input, select {
        width:100%;
        padding:10px 12px;
        border-radius:8px;
        border:1px solid #d1d5db;
        font-size:14px;
    }
    input.error, select.error {
        border-color:#ef4444;
        background:#fef2f2;
    }
    .error-text {
        color:#ef4444;
        font-size:12px;
        margin-top:4px;
    }
    .alert-error {
        background:#fee2e2;
        color:#991b1b;
        padding:12px 16px;
        border-radius:10px;
        margin-bottom:15px;
        border:1px solid #fecaca;
        font-size:14px;
    }
    .btn {
        padding:10px 18px;
        border-radius:8px;
        border:none;
        font-size:14px;
        cursor:pointer;
        text-decoration:none;
    }
    .btn-primary { background:#2563eb; color:#fff; }
    .btn-secondary { background:#6b7280; color:#fff; }
</style>

<div class="page-title">➕ Tambah Anggota Kabinet</div>

<div class="card-form">

    {{-- GLOBAL ERROR --}}
    @if ($errors->any())
        <div class="alert-error">
            <strong>Terjadi kesalahan!</strong>
            <ul style="margin:6px 0 0 16px;">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.members.store', $cabinet->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Nama Anggota</label>
            <input 
                type="text" 
                name="name" 
                value="{{ old('name') }}"
                class="@error('name') error @enderror"
                required
            >
            @error('name')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Foto</label>
            <input 
                type="file" 
                name="photo"
                class="@error('photo') error @enderror"
            >
            @error('photo')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Jenis Struktur</label>
            <select name="type" id="typeSelect" class="@error('type') error @enderror">
                <option value="core" {{ old('type')=='core'?'selected':'' }}>Struktur Inti</option>
                <option value="mpa" {{ old('type')=='mpa'?'selected':'' }}>MPA</option>
                <option value="division" {{ old('type')=='division'?'selected':'' }}>Divisi</option>
            </select>
            @error('type')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        {{-- JABATAN --}}
        <div class="form-group" id="positionBox">
            <label>Jabatan</label>
            <select name="position_id" id="positionSelect" class="@error('position_id') error @enderror">
                <option value="">-- Pilih Jabatan --</option>
                @foreach($positions as $pos)
                    <option 
                        value="{{ $pos->id }}" 
                        data-name="{{ strtolower($pos->name) }}"
                        {{ old('position_id')==$pos->id?'selected':'' }}
                    >
                        {{ $pos->name }}
                    </option>
                @endforeach
            </select>
            @error('position_id')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        {{-- DIVISI --}}
        <div class="form-group" id="divisionBox" style="display:none;">
            <label>Divisi</label>
            <select name="division_id" class="@error('division_id') error @enderror">
                <option value="">-- Pilih Divisi --</option>
                @foreach($divisions as $div)
                    <option value="{{ $div->id }}" {{ old('division_id')==$div->id?'selected':'' }}>
                        {{ $div->name }}
                    </option>
                @endforeach
            </select>
            @error('division_id')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top:20px; display:flex; gap:10px;">
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.cabinets.show', $cabinet->id) }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<script>
const typeSelect = document.getElementById('typeSelect');
const divisionBox = document.getElementById('divisionBox');
const positionBox = document.getElementById('positionBox');
const positionSelect = document.getElementById('positionSelect');

function filterPositions() {
    const type = typeSelect.value;
    const options = positionSelect.querySelectorAll('option');

    options.forEach(opt => {
        const name = opt.dataset.name || '';

        if (type === 'division') {
            opt.style.display = (name.includes('kepala divisi') || name.includes('anggota')) ? 'block' : 'none';
        }
        else if (type === 'core') {
            opt.style.display = (name.includes('kepala divisi') || name.includes('anggota')) ? 'none' : 'block';
        }
        else {
            opt.style.display = 'none';
        }
    });

    const visibleOption = [...options].find(opt => opt.style.display !== 'none');
    if (visibleOption) positionSelect.value = visibleOption.value;
}

function toggleForm() {
    const type = typeSelect.value;

    if (type === 'division') {
        divisionBox.style.display = 'block';
        positionBox.style.display = 'block';
    } 
    else if (type === 'mpa') {
        divisionBox.style.display = 'none';
        positionBox.style.display = 'none';
    } 
    else {
        divisionBox.style.display = 'none';
        positionBox.style.display = 'block';
    }

    filterPositions();
}

typeSelect.addEventListener('change', toggleForm);
toggleForm();
</script>

@endsection
