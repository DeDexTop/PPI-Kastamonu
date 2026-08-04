<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Member;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Form tambah anggota
     */
    public function create(Cabinet $cabinet)
    {
        $groups = $cabinet->groups()
            ->orderBy('sort_order')
            ->get();

        $positions = Position::orderBy('level')->get();

        return view('admin.member.create', compact(
            'cabinet',
            'groups',
            'positions'
        ));
    }

    /**
     * Simpan anggota
     */
    public function store(Request $request, Cabinet $cabinet)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',

            'cabinet_group_id' => 'required|exists:cabinet_groups,id',

            'position_id' => 'required|exists:positions,id',

            'sort_order' => 'nullable|integer|min:0',

            'photo' => 'nullable|image|max:1024',
        ]);

        DB::transaction(function () use ($request, &$data, $cabinet) {

            if ($request->hasFile('photo')) {

                $data['photo'] = $request
                    ->file('photo')
                    ->store('members', 'public');
            }

            $data['cabinet_id'] = $cabinet->id;

            $data['sort_order'] = $data['sort_order'] ?? 0;

            Member::create($data);
        });

        return redirect()
            ->route('admin.cabinets.show', $cabinet->id)
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Form edit anggota
     */
    public function edit(Cabinet $cabinet, Member $member)
    {
        $member->load([
            'group',
            'position'
        ]);

        $groups = $cabinet->groups()
            ->orderBy('sort_order')
            ->get();

        $positions = Position::orderBy('level')->get();

        return view('admin.member.edit', compact(
            'cabinet',
            'member',
            'groups',
            'positions'
        ));
    }

    /**
     * Update anggota
     */
    public function update(Request $request, Cabinet $cabinet, Member $member)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',

            'cabinet_group_id' => 'required|exists:cabinet_groups,id',

            'position_id' => 'required|exists:positions,id',

            'sort_order' => 'nullable|integer|min:0',

            'photo' => 'nullable|image|max:1024',
        ], [
            'photo.image' => 'File harus berupa gambar.',
            'photo.max'   => 'Ukuran file maksimal 1 MB.',
        ]);

        DB::transaction(function () use ($request, &$data, $member) {

            if ($request->hasFile('photo')) {

                if ($member->photo) {
                    Storage::disk('public')->delete($member->photo);
                }

                $data['photo'] = $request
                    ->file('photo')
                    ->store('members', 'public');
            }

            $data['sort_order'] = $data['sort_order'] ?? 0;

            $member->update($data);
        });

        return redirect()
            ->route('admin.cabinets.show', $cabinet->id)
            ->with('success', 'Anggota berhasil diperbarui.');
    }

    /**
     * Hapus anggota
     */
    public function destroy(Cabinet $cabinet, Member $member)
    {
        DB::transaction(function () use ($member) {

            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }

            $member->delete();
        });

        return redirect()
            ->route('admin.cabinets.show', $cabinet->id)
            ->with('success', 'Anggota berhasil dihapus.');
    }
}