<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerVacancyController extends Controller
{
    public function index()
    {
        if (!session()->has('vacancies')) {
            session([
                'vacancies' => [
                    1 => [
                        'id' => 1,
                        'tajuk' => 'Jurutera Perisian',
                        'kategori' => 'Teknologi Maklumat',
                        'lokasi' => 'Kota Samarahan',
                        'jenis_pekerjaan' => 'Sepenuh Masa',
                        'tarikh_tutup' => '2026-03-31',
                        'status' => 'Aktif',
                    ]
                ]
            ]);
        }

        $items = session('vacancies');

        return view('pages.vacancy.index', compact('items'));
    }

    public function create()
    {
        $str_mode = 'Tambah';
        $save_route = route('majikan.vacancy.store');
        $item = null;

        return view('pages.vacancy.form', compact('str_mode', 'save_route', 'item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tajuk' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jenis_pekerjaan' => 'required',
            'tarikh_tutup' => 'required',
            'status' => 'required',
        ]);

        $items = session('vacancies', []);
        $id = empty($items) ? 1 : max(array_keys($items)) + 1;

        $items[$id] = [
            'id' => $id,
            'tajuk' => $request->tajuk,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'tarikh_tutup' => $request->tarikh_tutup,
            'status' => $request->status,
        ];

        session(['vacancies' => $items]);

        return redirect()->route('majikan.vacancy.index')
            ->with('success', 'Jawatan kosong berjaya disimpan.');
    }

    public function edit($id)
    {
        // dummy data (prototype)
        $item = session('vacancies')[$id] ?? null;

        return view('majikan.vacancy.form', [
            'item' => $item,
            'str_mode' => 'Kemaskini',
            'save_route' => route('majikan.vacancy.store'),
        ]);
    }

    public function show($id)
    {
        $items = session('vacancies');

        if (!isset($items[$id])) abort(404);

        $item = $items[$id];

        return view('pages.vacancy.view', compact('item'));
    }
}
