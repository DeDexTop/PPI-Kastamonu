@extends('admin.layout.main')

@section('containers')
<style>
.org-container {
    display: flex;
    flex-direction: column;
    gap: 28px;
}

/* TITLE */
.org-title {
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 10px;
}

/* SECTION */
.org-section {
    background: #fff;
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}

.org-section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.org-section-title {
    font-size: 18px;
    font-weight: 600;
}

/* MEMBER GRID */
.member-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 14px;
}

/* MEMBER CARD */
.member-card {
    background: #f9fafb;
    border-radius: 14px;
    padding: 14px 12px;
    text-align: center;
    border: 1px solid #e5e7eb;
    position: relative;
    transition: .2s;
}

.member-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(0,0,0,0.08);
}

.member-card img {
    width: 74px;
    height: 74px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #e5e7eb;
    margin-bottom: 10px;
}

.member-name {
    font-size: 14px;
    font-weight: 600;
}

.member-role {
    font-size: 12px;
    margin-top: 4px;
    padding: 3px 10px;
    border-radius: 999px;
    background: #2563eb;
    color: #fff;
    display: inline-block;
}

/* ACTION BUTTON */
.card-actions {
    position: absolute;
    top: 6px;
    right: 6px;
    display: flex;
    gap: 5px;
}

.btn-edit {
    background: #f59e0b;
    color: white;
    font-size: 11px;
    padding: 3px 7px;
    border-radius: 6px;
    text-decoration: none;
}

.btn-delete {
    background: #ef4444;
    color: white;
    border: none;
    font-size: 11px;
    padding: 3px 7px;
    border-radius: 6px;
    cursor: pointer;
}

/* DIVISION BOX */
.division-box {
    background: #f8fafc;
    border-radius: 14px;
    padding: 16px;
    margin-top: 12px;
    border: 1px dashed #e5e7eb;
}

/* BUTTON ADD */
.btn-add {
    background: #2563eb;
    color: #fff;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 13px;
    text-decoration: none;
}

.btn-add:hover {
    background: #1e40af;
}
</style>

<div class="org-container">

    <div class="org-title">
        🏛️ Kabinet {{ $cabinet->name }}
    </div>

    {{-- ================= STRUKTUR INTI ================= --}}
    <div class="org-section">
        <div class="org-section-header">
            <div class="org-section-title">👑 Struktur Inti</div>
            <a href="{{ route('admin.members.create', ['cabinet' => $cabinet->id, 'type' => 'core']) }}" class="btn-add">
                + Tambah Inti
            </a>
        </div>

        <div class="member-grid">
            @forelse ($cabinet->coreMembers as $member)
                <div class="member-card">

                    <div class="card-actions">
                        <a href="{{ route('admin.members.edit', ['cabinet' => $cabinet->id, 'member' => $member->id]) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.members.destroy', ['cabinet' => $cabinet->id, 'member' => $member->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" onclick="return confirm('Hapus anggota ini?')">✕</button>
                        </form>
                    </div>

                    <img src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('img/blank.png') }}">
                    <div class="member-name">{{ $member->name }}</div>
                    <div class="member-role">{{ $member->position->name ?? 'Inti' }}</div>
                </div>
            @empty
                <p style="color:#6b7280;">Belum ada struktur inti.</p>
            @endforelse
        </div>
    </div>

    {{-- ================= MPA ================= --}}
    <div class="org-section">
        <div class="org-section-header">
            <div class="org-section-title">🏛️ MPA</div>
            <a href="{{ route('admin.members.create', ['cabinet' => $cabinet->id, 'type' => 'mpa']) }}" class="btn-add">
                + Tambah MPA
            </a>
        </div>

        <div class="member-grid">
            @forelse ($cabinet->mpaMembers as $member)
                <div class="member-card">

                    <div class="card-actions">
                        <a href="{{ route('admin.members.edit', ['cabinet' => $cabinet->id, 'member' => $member->id]) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('admin.members.destroy', ['cabinet' => $cabinet->id, 'member' => $member->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" onclick="return confirm('Hapus anggota ini?')">✕</button>
                        </form>
                    </div>

                    <img src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('img/blank.png') }}">
                    <div class="member-name">{{ $member->name }}</div>
                    <div class="member-role">MPA</div>
                </div>
            @empty
                <p style="color:#6b7280;">Belum ada anggota MPA.</p>
            @endforelse
        </div>
    </div>

    {{-- ================= DIVISI ================= --}}
    <div class="org-section">
        <div class="org-section-header">
            <div class="org-section-title">🧩 Divisi</div>
            <a href="{{ route('admin.divisions.create', $cabinet->id) }}" class="btn-add">
                + Tambah Divisi
            </a>
        </div>

        @forelse ($cabinet->divisions as $division)
            <div class="division-box">

                <div class="org-section-header">
                    <div class="org-section-title">Divisi {{ $division->name }}</div>
                    <div style="display:flex; gap:6px;">
                        <a href="{{ route('admin.members.create', ['cabinet' => $cabinet->id, 'division' => $division->id]) }}" class="btn-add">
                            + Anggota
                        </a>
                        <form action="{{ route('admin.divisions.destroy', $division->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" onclick="return confirm('Hapus divisi ini?')">Hapus</button>
                        </form>
                    </div>
                </div>

                <div class="member-grid">
                    @forelse ($division->members as $member)
                        <div class="member-card">

                            <div class="card-actions">
                                <a href="{{ route('admin.members.edit', ['cabinet' => $cabinet->id, 'member' => $member->id]) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('admin.members.destroy', ['cabinet' => $cabinet->id, 'member' => $member->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-delete" onclick="return confirm('Hapus anggota ini?')">✕</button>
                                </form>
                            </div>

                            <img src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('img/blank.png') }}">
                            <div class="member-name">{{ $member->name }}</div>
                            <div class="member-role">{{ $member->position->name ?? 'Anggota' }}</div>
                        </div>
                    @empty
                        <p style="color:#6b7280;">Belum ada anggota divisi.</p>
                    @endforelse
                </div>

            </div>
        @empty
            <p style="color:#6b7280;">Belum ada divisi.</p>
        @endforelse
    </div>

</div>

<a href="{{ route('admin.cabinets.index') }}" class="btn-add" style="margin-top:20px;">
    ⬅ Kembali
</a>
@endsection
