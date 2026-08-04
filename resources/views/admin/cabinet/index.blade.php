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
    </style>

    <div class="page-title">

        🏛️ Data Kabinet

    </div>

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

                    <th>Group</th>

                    <th>Anggota</th>

                    <th>Struktur</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($cabinets as $cabinet)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

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

                                    <button class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus kabinet ini?')">

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
@endsection
