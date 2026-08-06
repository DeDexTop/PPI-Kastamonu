<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Division;
use Illuminate\Support\Facades\DB;

class DivisionController extends Controller
{
    
    public function create($cabinetId)
    {
        $cabinet = Cabinet::findOrFail($cabinetId);

        return view('admin.division.create', compact('cabinet'));
    }

    /**
     * Simpan divisi baru
     */
    public function store(Request $request, $cabinetId)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        Division::create([
            'cabinet_id' => $cabinetId,
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.cabinets.show', $cabinetId)
            ->with('success', 'Divisi berhasil ditambahkan ✅');
    }

    /**
     * Form edit divisi
     */
    public function edit($id)
    {
        $division = Division::findOrFail($id);

        return view('admin.division.edit', compact('division'));
    }

    /**
     * Update divisi
     */
    public function update(Request $request, $id)
    {
        $division = Division::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $division->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.cabinets.show', $division->cabinet_id)
            ->with('success', 'Divisi berhasil diupdate ✨');
    }

    /**
     * Hapus divisi
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $division = Division::with('members')->findOrFail($id);

            // Hapus semua anggota divisi
            foreach ($division->members as $member) {
                if ($member->photo && file_exists(storage_path('app/public/' . $member->photo))) {
                    unlink(storage_path('app/public/' . $member->photo));
                }
                $member->delete();
            }

            // Hapus divisi
            $division->delete();
        });

        return back()->with('success', 'Divisi dan seluruh anggotanya berhasil dihapus.');
    }
}
