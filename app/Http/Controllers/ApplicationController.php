<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        // Dummy data untuk demo
        $items = [
            [
                'nama' => 'Ahmad bin Ali',
                'jawatan' => 'Software Engineer',
                'tarikh_mohon' => '10 Jan 2026',
                'status' => 'Baharu',
            ],
            [
                'nama' => 'Siti Aminah',
                'jawatan' => 'Pereka Grafik',
                'tarikh_mohon' => '11 Jan 2026',
                'status' => 'Disenarai Pendek',
            ],
        ];

        return view('pages.application.index', compact('items'));
    }
}
