@extends('admin.layout.main')

@section('containers')

    <style>
        .org-container {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .org-title {
            font-size: 28px;
            font-weight: 700;
        }

        .org-section {
            background: #fff;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .06);
        }

        .org-section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .org-section-title {
            font-size: 20px;
            font-weight: 700;
        }

        .org-section-desc {
            color: #6b7280;
            font-size: 14px;
        }

        .member-grid {

            display: grid;

            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));

            gap: 18px;

        }

        .member-card {

            background: #f9fafb;

            border-radius: 14px;

            padding: 16px;

            text-align: center;

            position: relative;

            border: 1px solid #e5e7eb;

        }

        .member-card img {

            width: 90px;

            height: 90px;

            object-fit: cover;

            border-radius: 50%;

            margin-bottom: 12px;

        }

        .member-name {

            font-weight: 700;

        }

        .member-role {

            margin-top: 6px;

            display: inline-block;

            background: #2563eb;

            color: #fff;

            padding: 3px 12px;

            border-radius: 999px;

            font-size: 12px;

        }

        .card-actions {

            position: absolute;

            top: 8px;

            right: 8px;

            display: flex;

            gap: 5px;

        }

        .btn-add {

            background: #2563eb;

            color: #fff;

            padding: 8px 14px;

            border-radius: 8px;

            text-decoration: none;

        }

        .btn-edit {

            background: #f59e0b;

            color: white;

            padding: 3px 8px;

            border-radius: 6px;

            text-decoration: none;

            font-size: 12px;

        }

        .btn-delete {

            background: #ef4444;

            color: white;

            border: none;

            padding: 3px 8px;

            border-radius: 6px;

            cursor: pointer;

            font-size: 12px;

        }

        .group-action {

            display: flex;

            gap: 8px;

        }
    </style>

    <div class="org-container">

        <div class="org-title">

            🏛️ Kabinet {{ $cabinet->name }}

        </div>


        <div style="display:flex;gap:10px;">

            <a href="{{ route('admin.groups.create', $cabinet->id) }}" class="btn-add">

                + Tambah Group

            </a>

            <a href="{{ route('admin.members.create', $cabinet->id) }}" class="btn-add">

                + Tambah Anggota

            </a>

        </div>


        @forelse($cabinet->groups as $group)
            <div class="org-section">

                <div class="org-section-header">

                    <div>

                        <div class="org-section-title">

                            {{ $group->name }}

                        </div>

                        @if ($group->description)
                            <div class="org-section-desc">

                                {{ $group->description }}

                            </div>
                        @endif

                    </div>


                    <div class="group-action">

                        <a href="{{ route('admin.groups.edit', $group->id) }}" class="btn-edit">

                            Edit Group

                        </a>

                        <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn-delete" onclick="return confirm('Hapus group ini?')">

                                Hapus

                            </button>

                        </form>

                    </div>

                </div>


                <div class="member-grid">

                    @forelse($group->members as $member)
                        <div class="member-card">

                            <div class="card-actions">

                                <a href="{{ route('admin.members.edit', ['cabinet' => $cabinet->id, 'member' => $member->id]) }}"
                                    class="btn-edit">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.members.destroy', ['cabinet' => $cabinet->id, 'member' => $member->id]) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn-delete" onclick="return confirm('Hapus anggota?')">

                                        ✕

                                    </button>

                                </form>

                            </div>


                            <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('img/blank.png') }}">


                            <div class="member-name">

                                {{ $member->name }}

                            </div>

                            <div class="member-role">

                                {{ $member->position->name ?? '-' }}

                            </div>

                        </div>

                    @empty

                        <p>

                            Belum ada anggota pada group ini.

                        </p>
                    @endforelse

                </div>

            </div>

        @empty

            <div class="org-section">

                Belum ada Group Struktur.

            </div>
        @endforelse


        <a href="{{ route('admin.cabinets.index') }}" class="btn-add" style="width:fit-content">

            ⬅ Kembali

        </a>

    </div>

@endsection
