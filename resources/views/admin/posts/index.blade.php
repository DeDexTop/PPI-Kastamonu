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

    .actions {
        display: flex;
        gap: 6px;
    }

    .author-badge {
        display: inline-block;
        background: #eef2ff;
        color: #3730a3;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
    }
</style>

<div class="page-title">📝 Data Posts</div>

<a href="{{ route('admin.posts.create') }}" class="btn btn-primary" style="margin-bottom:15px;">
    + Tambah Post
</a>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Thumbnail</th>
                <th>Author</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>{{ $post->title }}</td>

                <td>
                    <img 
                        src="{{ asset('storage/'.$post->thumbnail) }}" 
                        class="thumbnail"
                    >
                </td>

                <td>
                    <span class="author-badge">
                        {{ $post->author->pen_name ?? $post->author->name }}
                    </span>
                </td>

                <td>
                    {{ Str::limit(strip_tags($post->content), 120) }}
                </td>

                <td>
                    <div class="actions">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" 
                           class="btn btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('admin.posts.destroy', $post->id) }}" 
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                    onclick="return confirm('Hapus post ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center; padding:20px;">
                    Data post belum tersedia
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
