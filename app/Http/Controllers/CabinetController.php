<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CabinetController extends Controller
{
    public function index()
    {
        $cabinets = Cabinet::orderBy('start_period', 'desc')->paginate(10);

        return view('admin.cabinet.index', compact('cabinets'));
    }

    public function create()
    {
        return view('admin.cabinet.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'start_period' => 'required',
            'end_period' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        Cabinet::create($data);

        return redirect()
            ->route('admin.cabinets.index')
            ->with('success', 'Kabinet berhasil ditambahkan.');
    }

    public function show(Cabinet $cabinet)
    {
        $cabinet->load([
            'groups' => function ($query) {
                $query->orderBy('sort_order');
            },
            'groups.members' => function ($query) {
                $query->orderBy('sort_order')
                      ->orderBy('position_id');
            },
            'groups.members.position',
        ]);

        return view('admin.cabinet.show', compact('cabinet'));
    }

    public function edit(Cabinet $cabinet)
    {
        return view('admin.cabinet.edit', compact('cabinet'));
    }

    public function update(Request $request, Cabinet $cabinet)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'start_period' => 'required',
            'end_period' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        $cabinet->update($data);

        return redirect()
            ->route('admin.cabinets.index')
            ->with('success', 'Kabinet berhasil diperbarui.');
    }

    public function destroy(Cabinet $cabinet)
    {
        $cabinet->load('groups.members');

        foreach ($cabinet->groups as $group) {

            foreach ($group->members as $member) {

                if ($member->photo) {
                    Storage::disk('public')->delete($member->photo);
                }

                $member->delete();
            }

            $group->delete();
        }

        $cabinet->delete();

        return redirect()
            ->route('admin.cabinets.index')
            ->with('success', 'Kabinet berhasil dihapus.');
    }
}
