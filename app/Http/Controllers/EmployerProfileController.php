<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerProfileController extends Controller
{
    public function show()
    {
        // Dummy: ambil dari session, kalau tak ada -> default
        $profile = session('majikan_profile', [
            'nama_syarikat' => auth()->user()->name ?? 'Majikan',
            'no_ssm' => '-',
            'telefon' => '-',
            'emel' => auth()->user()->email ?? '-',
            'website' => '-',
            'alamat' => '-',
            'ringkasan' => 'Profil majikan (prototaip).',
        ]);

        return view('pages.majikan.view', compact('profile'));
    }

    public function edit()
    {
        $profile = session('majikan_profile', [
            'nama_syarikat' => auth()->user()->name ?? '',
            'no_ssm' => '',
            'telefon' => '',
            'emel' => auth()->user()->email ?? '',
            'website' => '',
            'alamat' => '',
            'ringkasan' => '',
        ]);

        // guna mode macam modul kampus awak (str_mode + save_route)
        $str_mode = 'Kemaskini';
        $save_route = route('majikan.profile.update');

        return view('pages.majikan.form', compact('profile', 'str_mode', 'save_route'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nama_syarikat' => 'required|string|max:255',
            'no_ssm' => 'nullable|string|max:50',
            'telefon' => 'nullable|string|max:30',
            'emel' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:1000',
            'ringkasan' => 'nullable|string|max:2000',
        ]);

        // Simpan session (dummy)
        session(['majikan_profile' => $data]);

        return redirect()->route('majikan.profile.show')
            ->with('success', 'Profil majikan berjaya dikemaskini (prototaip).');
    }
}
