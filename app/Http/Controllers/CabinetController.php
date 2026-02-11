<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabinet;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class CabinetController extends Controller
{
    public function index()
    {
        $cabinets = Cabinet::latest()->get();
        return view('admin.cabinet.index', compact('cabinets'));
    }

    public function create()
    {
        return view('admin.cabinet.create');
    }

    public function store(Request $request)
    {
        Cabinet::create($request->validate([
            'name' => 'required',
            'start_period' => 'required',
            'end_period' => 'required',
            'status' => 'required',
        ]));

        return redirect()->route('admin.cabinets.index');
    }

    public function show($id)
    {
        $cabinet = Cabinet::with([
            'coreMembers' => function ($q) {
                $q->leftJoin('positions', 'members.position_id', '=', 'positions.id')
                ->orderBy('positions.level', 'asc')
                ->select('members.*');
            },
            'mpaMembers',
            'divisions.members' => function ($q) {
                $q->leftJoin('positions', 'members.position_id', '=', 'positions.id')
                ->orderBy('positions.level', 'asc')
                ->select('members.*');
            },
            'divisions.members.position'
        ])->findOrFail($id);
        return view('admin.cabinet.show', compact('cabinet'));
    }

    public function edit($id)
    {
        $cabinet = Cabinet::findOrFail($id);
        return view('admin.cabinet.edit', compact('cabinet'));
    }

    public function update(Request $request, $id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $cabinet->update($request->validate([
            'name' => 'required',
            'period' => 'required',
            'status' => 'required',
        ]));

        return redirect()->route('admin.cabinets.index');
    }

     public function destroy(Cabinet $cabinet)
    {
        foreach ($cabinet->members as $member) {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        $member->delete();
    }

    $cabinet->delete();

    return redirect()->route('admin.cabinets.index');
    }
}

