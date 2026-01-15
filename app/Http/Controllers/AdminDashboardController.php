<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Dummy statistik untuk demo admin
        $stats = [
            'jumlah_majikan'      => 8,
            'jumlah_pencari'      => 120,
            'jumlah_jawatan'      => 25,
            'jumlah_permohonan'   => 210,
            'permohonan_baharu'   => 12,
            'jawatan_aktif'       => 18,
        ];

        // Dummy ringkasan jadual
        $latestVacancies = [
            [
                'tajuk' => 'Software Engineer',
                'majikan' => 'ABC Technologies',
                'jenis' => 'Sepenuh Masa',
                'status' => 'Aktif',
                'tutup' => '31 Jan 2026',
                'view_url' => '#',
            ],
            [
                'tajuk' => 'Intern IT Support',
                'majikan' => 'XYZ Holdings',
                'jenis' => 'Latihan Industri',
                'status' => 'Aktif',
                'tutup' => '15 Feb 2026',
                'view_url' => '#',
            ],
        ];

        $latestApplications = [
            [
                'nama' => 'Nur Aina Binti Ahmad',
                'jawatan' => 'Software Engineer',
                'majikan' => 'ABC Technologies',
                'status' => 'Baharu',
                'tarikh' => '10 Jan 2026',
                'view_url' => '#',
            ],
            [
                'nama' => 'Muhammad Irfan Bin Ali',
                'jawatan' => 'Intern IT Support',
                'majikan' => 'XYZ Holdings',
                'status' => 'Dalam Semakan',
                'tarikh' => '09 Jan 2026',
                'view_url' => '#',
            ],
        ];

        return view('pages.admin.dashboard', compact('stats', 'latestVacancies', 'latestApplications'));
    }
}
