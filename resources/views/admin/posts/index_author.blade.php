@extends('admin.layout.main')

@section('containers')

<style>
.page-title{
    font-size:24px;
    font-weight:600;
    margin-bottom:20px;
}

.btn{
    padding:8px 14px;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
    cursor:pointer;
    border:none;
}

.btn-primary{
    background:#2563eb;
    color:#fff;
}

.btn-warning{
    background:#f59e0b;
    color:#fff;
}

.btn-danger{
    background:#dc2626;
    color:#fff;
}

.table-wrapper{
    background:#fff;
    border-radius:10px;
    box-shadow:0 10px 20px rgba(0,0,0,.06);
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
    min-width:900px;
}

th{
    background:#f8fafc;
    text-align:left;
    padding:12px;
    font-size:14px;
    font-weight:600;
    border-bottom:1px solid #e5e7eb;
}

td{
    padding:12px;
    font-size:14px;
    border-bottom:1px solid #e5e7eb;
    vertical-align:middle;
}

tr:hover{
    background:#f9fafb;
}

.photo{
    width:70px;
    height:70px;
    object-fit:cover;
    border-radius:20%;
    border:2px solid #eee;
}

.actions{
    display:flex;
    gap:6px;
}

.author-badge{
    display:inline-block;
    background:#eef2ff;
    color:#3730a3;
    padding:4px 10px;
    border-radius:20px;
    font-size:13px;
    font-weight:500;
}

.bio{
    max-width:350px;
    color:#555;
}
</style>

<div class="page-title">
    👨‍💻 Data Penulis
</div>

<a href="{{ route('admin.posts.create_author') }}"
   class="btn btn-primary"
   style="margin-bottom:15px;">
    + Tambah Penulis
</a>

<div class="table-wrapper">

<table>

<thead>
<tr>
    <th width="60">No</th>
    <th>Foto</th>
    <th>Nama</th>
    <th>Nama Pena</th>
    <th>Bio</th>
    <th width="170">Aksi</th>
</tr>
</thead>

<tbody>

@forelse($authors as $author)

<tr>

    <td>{{ $loop->iteration }}</td>

    <td>

        @if($author->photo)

            <img
                src="{{ asset('storage/'.$author->photo) }}"
                class="photo">

        @else

            <img
                src="{{ asset('img/blank.png') }}"
                class="photo">

        @endif

    </td>

    <td>
        <strong>{{ $author->name }}</strong>
    </td>

    <td>

        <span class="author-badge">
            {{ $author->pen_name ?? '-' }}
        </span>

    </td>

    <td class="bio">
        {{ Str::limit(strip_tags($author->bio),100) }}
    </td>

    <td>

        <div class="actions">

            <a
                href="{{ route('admin.posts.edit_author',$author->id) }}"
                class="btn btn-warning">
                Edit
            </a>

            <form
                action="{{ route('admin.posts.destroy_author',$author->id) }}"
                method="POST">

                @csrf
                @method('DELETE')

                <button
                    class="btn btn-danger"
                    onclick="return confirm('Yakin ingin menghapus penulis beserta seluruh postingannya?')">

                    Hapus

                </button>

            </form>

        </div>

    </td>

</tr>

@empty

<tr>

    <td colspan="6" style="text-align:center;padding:25px;">
        Belum ada data penulis.
    </td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection