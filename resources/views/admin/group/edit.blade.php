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
            max-width: 750px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        input.error,
        textarea.error {
            border-color: #ef4444;
            background: #fef2f2;
        }

        .error-text {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: #fff;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #6b7280;
            color: #fff;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }
    </style>


    <div class="page-title">
        ✏️ Edit Group Struktur
    </div>


    <div class="card-form">


        <form action="{{ route('admin.groups.update', $group->id) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="form-group">

                <label>
                    Nama Group
                </label>

                <input type="text" name="name" value="{{ old('name', $group->name) }}"
                    class="@error('name') error @enderror" placeholder="Contoh : Badan Pengurus Harian" required>


                @error('name')
                    <div class="error-text">
                        {{ $message }}
                    </div>
                @enderror

            </div>



            <div class="form-group">

                <label>
                    Deskripsi
                </label>


                <textarea name="description" rows="3" class="@error('description') error @enderror"
                    placeholder="Deskripsi group...">{{ old('description', $group->description) }}</textarea>


                @error('description')
                    <div class="error-text">
                        {{ $message }}
                    </div>
                @enderror

            </div>



            <div class="form-group">

                <label>
                    Urutan
                </label>


                <input type="number" name="sort_order" value="{{ old('sort_order', $group->sort_order) }}"
                    class="@error('sort_order') error @enderror" min="0">


                <small style="color:#6b7280;">
                    Semakin kecil angkanya, semakin atas posisinya.
                </small>


                @error('sort_order')
                    <div class="error-text">
                        {{ $message }}
                    </div>
                @enderror


            </div>



            <div style="display:flex;gap:10px;margin-top:20px;">


                <button class="btn btn-primary">
                    Update
                </button>


                <a href="{{ route('admin.cabinets.show', $group->cabinet_id) }}" class="btn btn-secondary">
                    Kembali
                </a>


            </div>


        </form>


    </div>
@endsection
