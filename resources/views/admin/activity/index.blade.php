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
        display: inline-block;
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
        margin-bottom: 20px;
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

    /* Desain Kustom Pagination Serasi */
    .custom-pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
        padding: 12px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .04);
        margin-top: 15px;
    }

    .pagination-info {
        font-size: 14px;
        color: #64748b;
    }

    .pagination-links {
        display: flex;
        gap: 6px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination-links a, .pagination-links span {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 8px;
        font-size: 14px;
        font-weight: 500;
        color: #475569;
        text-decoration: none;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .pagination-links a:hover {
        background: #f1f5f9;
        color: #2563eb;
        border-color: #cbd5e1;
    }

    .pagination-links .active span {
        background: #2563eb;
        color: #fff;
        border-color: #2563eb;
    }

    .pagination-links .disabled span {
        color: #94a3b8;
        background: #f1f5f9;
        border-color: #e2e8f0;
        cursor: not-allowed;
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
                <td>{{ ($activities->currentPage() - 1) * $activities->perPage() + $loop->iteration }}</td>

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

{{-- Struktur Pagination Kustom --}}
@if ($activities->hasPages())
    <div class="custom-pagination">
        <div class="pagination-info">
            Menampilkan {{ $activities->firstItem() }} sampai {{ $activities->lastItem() }} dari {{ $activities->total() }} data
        </div>
        
        <ul class="pagination-links">
            {{-- Tombol Sebelumnya --}}
            @if ($activities->onFirstPage())
                <li class="disabled"><span>&laquo;</span></li>
            @else
                <li><a href="{{ $activities->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            {{-- Elemen Nomor Halaman --}}
            @foreach ($activities->getUrlRange(1, $activities->lastPage()) as $page => $url)
                @if ($page == $activities->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            {{-- Tombol Selanjutnya --}}
            @if ($activities->hasMorePages())
                <li><a href="{{ $activities->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="disabled"><span>&raquo;</span></li>
            @endif
        </ul>
    </div>
@endif
@endsection
