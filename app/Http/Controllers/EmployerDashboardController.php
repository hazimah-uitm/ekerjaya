<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class EmployerDashboardController extends Controller
{
    public function index()
    {
        // Dummy statistik untuk demo
        $stats = [
            'jawatan'     => 4,
            'permohonan'  => 12,
            'baharu'      => 5,
            'shortlist'   => 3,
        ];

        return view('pages.majikan.dashboard', compact('stats'));
    }
}
