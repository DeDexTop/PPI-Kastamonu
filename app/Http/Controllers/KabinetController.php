<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;

class KabinetController extends Controller
{
    public function index()
    {
        $title = 'PPI Kastamonu - Kabinet Kami';

        $cabinet = Cabinet::with([
            'groups' => function ($query) {
                $query->orderBy('sort_order');
            },
            'groups.members' => function ($query) {
                $query->orderBy('sort_order')
                      ->orderBy('position_id');
            },
            'groups.members.position',
        ])
        ->where('status', 'active')   // Hanya kabinet aktif
        ->first();

        return view('user.cabinet', compact('cabinet', 'title'));
    }

    public function list()
    {
        $cabinets = Cabinet::orderBy('start_period', 'desc')->get();

        $title = 'PPI Kastamonu - Kabinet - Arsip Kabinet';

        return view('user.cabinet_list', compact('cabinets', 'title'));
    }

    public function show(Cabinet $cabinet)
    {
        $title = 'PPI Kastamonu - Kabinet - ' . $cabinet->name;

        $cabinet = Cabinet::with([
            'groups' => function ($query) {
                $query->orderBy('sort_order');
            },
            'groups.members' => function ($query) {
                $query->orderBy('sort_order')
                      ->orderBy('position_id');
            },
            'groups.members.position',
        ])
        ->orderBy('start_period', 'desc')
        ->findOrFail($cabinet->id);

        return view('user.cabinet_show', compact('cabinet', 'title'));
    }
}