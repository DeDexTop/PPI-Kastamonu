<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Member;
use App\Models\Position;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function create(Cabinet $cabinet)
    {
        $divisions = $cabinet->divisions;
        $positions = Position::all();

        return view('admin.member.create', compact('cabinet', 'divisions', 'positions'));
    }

    public function store(Request $request, Cabinet $cabinet)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'division_id' => 'nullable',
            'position_id' => 'nullable',
            'photo' => 'image|nullable|max:1024'
        ]);

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        $data['cabinet_id'] = $cabinet->id;

        Member::create($data);

        return redirect()->route('admin.cabinets.show', $cabinet->id);
    }

    public function edit(Cabinet $cabinet, Member $member)
    {
        $divisions = $cabinet->divisions;
        $positions = Position::all();

        return view('admin.member.edit', compact('cabinet', 'member', 'divisions', 'positions'));
    }

    public function update(Request $request, Cabinet $cabinet, Member $member)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'division_id' => 'nullable',
            'position_id' => 'nullable',
            'photo' => 'image|nullable|max:1024'
        ],
        [
            'photo.image' => 'File harus berupa gambar.',
            'photo.max' => 'Ukuran file tidak boleh lebih dari 1024KB.',
        ]);

        if ($request->file('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        $member->update($data);

        return redirect()->route('admin.cabinets.show', $cabinet->id);
    }

    public function destroy(Cabinet $cabinet, Member $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }

        $member->delete();

        return redirect()->route('admin.cabinets.show', $cabinet->id);
    }
}

