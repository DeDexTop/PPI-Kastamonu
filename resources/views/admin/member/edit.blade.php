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
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            max-width: 720px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        input,
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }

        .error-text {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
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

        .preview-photo {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: 12px;
            border: 3px solid #e5e7eb;
        }
    </style>

    <div class="page-title">

        ✏️ Edit Anggota Kabinet

    </div>

    <div class="card-form">

        @if ($errors->any())
            <div class="alert-error">

                <strong>Terjadi kesalahan :</strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif


        <form action="{{ route('admin.members.update', ['cabinet' => $cabinet->id, 'member' => $member->id]) }}" method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <div class="form-group">

                <label>Nama Anggota</label>

                <input type="text" name="name" value="{{ old('name', $member->name) }}" required>

                @error('name')
                    <div class="error-text">

                        {{ $message }}

                    </div>
                @enderror

            </div>



            <div class="form-group">

                <label>Foto Baru</label>

                <input type="file" name="photo">

                @if ($member->photo)
                    <img src="{{ asset('storage/' . $member->photo) }}" class="preview-photo">
                @endif

                @error('photo')
                    <div class="error-text">

                        {{ $message }}

                    </div>
                @enderror

            </div>



            <div class="form-group">

                <label>Group Struktur</label>

                <select name="cabinet_group_id" required>

                    <option value="">

                        -- Pilih Group --

                    </option>

                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}"
                            {{ old('cabinet_group_id', $member->cabinet_group_id) == $group->id ? 'selected' : '' }}>

                            {{ $group->name }}

                        </option>
                    @endforeach

                </select>

                @error('cabinet_group_id')
                    <div class="error-text">

                        {{ $message }}

                    </div>
                @enderror

            </div>



            <div class="form-group">

                <label>Jabatan</label>

                <select name="position_id" required>

                    <option value="">

                        -- Pilih Jabatan --

                    </option>

                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}"
                            {{ old('position_id', $member->position_id) == $position->id ? 'selected' : '' }}>

                            {{ $position->name }}

                        </option>
                    @endforeach

                </select>

                @error('position_id')
                    <div class="error-text">

                        {{ $message }}

                    </div>
                @enderror

            </div>



            <div class="form-group">

                <label>Urutan Tampil</label>

                <input type="number" name="sort_order" value="{{ old('sort_order', $member->sort_order) }}">

                <small>

                    Semakin kecil angka maka semakin atas.

                </small>

                @error('sort_order')
                    <div class="error-text">

                        {{ $message }}

                    </div>
                @enderror

            </div>



            <div class="mt-4 d-flex gap-2">

                <button class="btn btn-primary">

                    Update

                </button>

                <a href="{{ route('admin.cabinets.show', $cabinet->id) }}" class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </form>

    </div>

@endsection
