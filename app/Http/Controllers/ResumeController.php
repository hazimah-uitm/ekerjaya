<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function pdf(Request $request)
    {
        // PROTOTAIP: ambil profil dari session (kalau tak ada, guna dummy)
        $userName = session('user.name') ?? (auth()->user()->name ?? 'Nama Anda');

        $profile = session('profile') ?? [
            'no_ic' => '000000-00-0000',
            'telefon' => '01X-XXXXXXX',
            'email' => auth()->user()->email ?? 'contoh@email.com',
            'alamat' => 'Alamat ringkas (Prototaip)',
            'poskod' => '00000',
            'bandar' => 'Kuching',
            'negeri' => 'Sarawak',

            'jawatan_sasaran' => 'Jawatan Sasaran (contoh: Software Engineer)',
            'ringkasan' => 'Ringkasan profil anda akan dipaparkan di sini. Contoh: graduan bidang IT, berminat dalam pembangunan sistem, pantas belajar dan mampu bekerja dalam pasukan.',
            'kemahiran' => ['Laravel', 'PHP', 'HTML/CSS', 'Bootstrap', 'MySQL (asas)'],
            'bahasa' => ['Bahasa Melayu', 'English'],

            'pendidikan' => [
                [
                    'institusi' => 'Universiti Contoh',
                    'tahap' => 'Ijazah Sarjana Muda',
                    'bidang' => 'Sains Komputer',
                    'tahun' => '2022 - 2025',
                ],
            ],

            'pengalaman' => [
                [
                    'jawatan' => 'Intern Web Developer',
                    'organisasi' => 'Syarikat Contoh',
                    'tahun' => '2025',
                    'huraian' => 'Membantu membangunkan modul sistem, kemaskini UI, dan pengujian asas.',
                ],
            ],

            'projek' => [
                [
                    'tajuk' => 'Sistem Tempahan Ruang',
                    'huraian' => 'Prototaip sistem tempahan dan kelulusan menggunakan Laravel.',
                ],
            ],
        ];

        $data = compact('userName', 'profile');

        $pdf = PDF::loadView('frontend.pages.resume_pdf', $data)
            ->setPaper('a4', 'portrait');

        $filename = 'Resume_' . preg_replace('/\s+/', '_', $userName) . '.pdf';

        return $pdf->download($filename);
    }
}
