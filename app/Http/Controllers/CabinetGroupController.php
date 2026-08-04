<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\CabinetGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CabinetGroupController extends Controller
{
    /**
     * Form tambah group
     */
    public function create(Cabinet $cabinet)
    {
        return view('admin.group.create', compact('cabinet'));
    }

    /**
     * Simpan group baru
     */
    public function store(Request $request, Cabinet $cabinet)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['cabinet_id'] = $cabinet->id;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        CabinetGroup::create($data);

        return redirect()
            ->route('admin.cabinets.show', $cabinet->id)
            ->with('success', 'Grup berhasil ditambahkan.');
    }

    /**
     * Form edit group
     */
    public function edit(CabinetGroup $group)
    {
        return view('admin.group.edit', compact('group'));
    }

    /**
     * Update group
     */
    public function update(Request $request, CabinetGroup $group)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;

        $group->update($data);

        return redirect()
            ->route('admin.cabinets.show', $group->cabinet_id)
            ->with('success', 'Grup berhasil diperbarui.');
    }

    /**
     * Hapus group
     */
    public function destroy(CabinetGroup $group)
    {
        DB::transaction(function () use ($group) {

            // Hapus semua anggota di group
            foreach ($group->members as $member) {

                if ($member->photo) {
                    \Storage::disk('public')->delete($member->photo);
                }

                $member->delete();
            }

            $group->delete();
        });

        return redirect()
            ->route('admin.cabinets.show', $group->cabinet_id)
            ->with('success', 'Grup berhasil dihapus.');
    }
}