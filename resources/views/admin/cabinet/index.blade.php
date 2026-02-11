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
        font-size: 14px;
        border: none;
        cursor: pointer;
        text-decoration: none;
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
        box-shadow: 0 10px 20px rgba(0,0,0,0.06);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #f8fafc;
        padding: 12px;
        font-size: 14px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    td {
        padding: 12px;
        font-size: 14px;
        border-bottom: 1px solid #e5e7eb;
    }

    .badge {
        padding: 4px 10px;
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
        gap: 6px;
    }
</style>

<div class="page-title">🏛️ Data Kabinet</div>

<a href="{{ route('admin.cabinets.create') }}" class="btn btn-primary mb-3">
    + Tambah Kabinet
</a>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kabinet</th>
                <th>Periode</th>
                <th>Status</th>
                <th>Struktur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($cabinets as $cabinet)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cabinet->name }}</td>
                <td>{{ $cabinet->start_period }}/{{ $cabinet->end_period }}</td>
                <td>
                    @if($cabinet->status == 'active')
                        <span class="badge badge-active">Aktif</span>
                    @else
                        <span class="badge badge-inactive">Tidak Aktif</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.cabinets.show', $cabinet->id) }}" 
                        class="btn btn-primary btn-sm">
                        Lihat Struktur
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
                            <button class="btn btn-danger" onclick="return confirm('Hapus kabinet ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align:center; padding:20px;">
                    Data kabinet belum tersedia
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
