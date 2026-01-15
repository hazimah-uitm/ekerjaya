<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class EmployerDashboardController extends Controller
{
public function index()
    {
        $stats = [
            'jawatan'     => 4,
            'permohonan'  => 12,
            'baharu'      => 5,
            'shortlist'   => 3,
        ];

        // Dummy profil majikan
        $profile = [
            'nama_syarikat' => 'ABC Technologies Sdn. Bhd.',
            'telefon'       => '01X-XXXXXXX',
            'emel'          => 'hr@abctech.com',
        ];

        // Dummy jawatan
        $vacancies = [
            [
                'tajuk'   => 'Software Engineer',
                'jenis'   => 'Sepenuh Masa',
                'tutup'   => '31 Jan 2026',
                'status'  => 'Aktif',
                'view_url'=> '#',
                'edit_url'=> '#',
            ],
            [
                'tajuk'   => 'Intern IT Support',
                'jenis'   => 'Latihan Industri',
                'tutup'   => '15 Feb 2026',
                'status'  => 'Aktif',
                'view_url'=> '#',
                'edit_url'=> '#',
            ],
        ];

        // Dummy permohonan
        $applications = [
            [
                'nama'    => 'Nur Aina Binti Ahmad',
                'jawatan' => 'Software Engineer',
                'tarikh'  => '10 Jan 2026',
                'status'  => 'Baharu',
                'view_url'=> '#',
            ],
            [
                'nama'    => 'Muhammad Irfan Bin Ali',
                'jawatan' => 'Intern IT Support',
                'tarikh'  => '09 Jan 2026',
                'status'  => 'Disenarai Pendek',
                'view_url'=> '#',
            ],
        ];

        return view('pages.majikan.dashboard', compact('stats', 'profile', 'vacancies', 'applications'));
    }
}
