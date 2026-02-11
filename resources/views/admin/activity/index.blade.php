@extends('admin.layout.main')

@section('containers')
<style>
    .page-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .btn {
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
        border: none;
    }

    .btn-primary {
        background: #2563eb;
        color: #fff;
    }

    .btn-warning {
        background: #f59e0b;
        color: #fff;
    }

    .btn-danger {
        background: #dc2626;
        color: #fff;
    }

    .table-wrapper {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.06);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    th {
        background: #f8fafc;
        text-align: left;
        padding: 12px;
        font-size: 14px;
        font-weight: 600;
        border-bottom: 1px solid #e5e7eb;
    }

    td {
        padding: 12px;
        font-size: 14px;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: top;
    }

    tr:hover {
        background: #f9fafb;
    }

    .thumbnail {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 6px;
    }

    .images img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 6px;
        margin-right: 4px;
        margin-bottom: 4px;
        border: 1px solid #e5e7eb;
    }

    .actions {
        display: flex;
        gap: 6px;
    }
    .image-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        max-width: 220px;
        max-height: 140px;
        overflow-y: auto;
    }

    .image-grid img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
    }
    .image-grid img:hover {
        transform: scale(1.05);
        transition: .2s;
    }


</style>

<div class="page-title">📌 Data Aktivitas</div>

<a href="{{ route('admin.activity.create') }}" class="btn btn-primary" style="margin-bottom:25px;">
    + Tambah Aktivitas
</a>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Thumbnail</th>
                <th>Deskripsi</th>
                <th>Gambar Aktivitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($activities as $activity)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>{{ $activity->nama }}</td>

                <td>
                    <img 
                        src="{{ asset('storage/'.$activity->thumbnail) }}" 
                        class="thumbnail"
                    >
                </td>

                <td>{{ Str::limit($activity->deskripsi, 120) }}</td>

                <td>
                    <div class="image-grid">
                        @foreach ($activity->images as $img)
                            <img src="{{ asset('storage/'.$img->image_path) }}">
                        @endforeach
                    </div>
                </td>


                <td>
                    <div class="actions">
                        <a href="{{ route('admin.activity.edit', $activity->id) }}" class="btn btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('admin.activity.destroy', $activity->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Hapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center; padding:20px;">
                    Data aktivitas belum tersedia
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
