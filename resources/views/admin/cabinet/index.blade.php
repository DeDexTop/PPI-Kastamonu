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
            border-radius: 8px;
            border: none;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
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
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-active {
            background: #dcfce7;
            color: #166534;
        }

        .badge-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        /* Desain Kustom Pagination Serasi */
        .custom-pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 12px 20px;
            border-radius: 12px;
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
            border-radius: 8px;
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

    <div class="page-title">
        🏛️ Data Kabinet
    </div>

    <div style="margin-bottom: 15px;">
        <a href="{{ route('admin.cabinets.create') }}" class="btn btn-primary">
            + Tambah Kabinet
        </a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kabinet</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th>Group</th>
                    <th>Anggota</th>
                    <th>Struktur</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cabinets as $cabinet)
                    <tr>
                        <td>{{ ($cabinets->currentPage() - 1) * $cabinets->perPage() + $loop->iteration }}</td>
                        <td>
                            <strong>{{ $cabinet->name }}</strong>
                        </td>
                        <td>
                            {{ $cabinet->start_period }} - {{ $cabinet->end_period }}
                        </td>
                        <td>
                            @if ($cabinet->status == 'active')
                                <span class="badge badge-active">
                                    Aktif
                                </span>
                            @else
                                <span class="badge badge-inactive">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td>
                            {{ $cabinet->groups->count() }}
                        </td>
                        <td>
                            {{ $cabinet->members->count() }}
                        </td>
                        <td>
                            <a href="{{ route('admin.cabinets.show', $cabinet->id) }}" class="btn btn-primary">
                                Kelola Struktur
                            </a>
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('admin.cabinets.edit', $cabinet->id) }}" class="btn btn-warning">
                                    Edit
                                </a>
                                <form action="{{ route('admin.cabinets.destroy', $cabinet->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kabinet ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align:center;padding:25px;">
                            Belum ada data kabinet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Struktur Pagination Kustom Manual --}}
    @if ($cabinets->hasPages())
        <div class="custom-pagination">
            <div class="pagination-info">
                Menampilkan {{ $cabinets->firstItem() }} sampai {{ $cabinets->lastItem() }} dari {{ $cabinets->total() }} data
            </div>
            
            <ul class="pagination-links">
                {{-- Tombol Sebelumnya --}}
                @if ($cabinets->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li>
                @else
                    <li><a href="{{ $cabinets->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                @endif

                {{-- Elemen Nomor Halaman --}}
                @foreach ($cabinets->getUrlRange(1, $cabinets->lastPage()) as $page => $url)
                    @if ($page == $cabinets->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

                {{-- Tombol Selanjutnya --}}
                @if ($cabinets->hasMorePages())
                    <li><a href="{{ $cabinets->nextPageUrl() }}" rel="next">&raquo;</a></li>
                @else
                    <li class="disabled"><span>&raquo;</span></li>
                @endif
            </ul>
        </div>
    @endif
@endsection
