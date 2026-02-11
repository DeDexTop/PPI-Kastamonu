<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;

class KabinetController extends Controller
{
    public function index()
    {
        $title = 'PPI Kastamonu -  Kabinet Kami';
        $cabinet = Cabinet::with([
            'coreMembers.position',
            'mpaMembers',
            'divisions.members.position'
        ])
        ->where('status', true)
        ->first();

        return view('user.cabinet', compact('cabinet', 'title'));
    }

    public function list()
    {
        $cabinets = Cabinet::orderBy('start_period', 'desc')->get();
        $title = 'PPI Kastamonu -  kabinet - Arsip Kabinet';

        return view('user.cabinet_list', compact('cabinets', 'title'));
    }

    public function show(Cabinet $cabinet)
    {
        $title = 'PPI Kastamonu -  Kabinet - ' . $cabinet->name;
        $cabinet->load([
            'coreMembers.position',
            'mpaMembers',
            'divisions.members.position'
        ]);

        return view('user.cabinet_show', compact('cabinet', 'title'));
    }
}
