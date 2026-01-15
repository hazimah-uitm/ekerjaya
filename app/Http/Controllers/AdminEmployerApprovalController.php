<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminEmployerApprovalController extends Controller
{
    public function index(Request $request)
    {
        // Seed dummy jika tiada dalam session
        if (!session()->has('employers')) {
            session([
                'employers' => [
                    [
                        'id' => 1,
                        'nama_syarikat' => 'ABC Technologies Sdn Bhd',
                        'no_ssm' => '202001234567',
                        'telefon' => '082-123456',
                        'emel' => 'hr@abctech.com',
                        'status' => 'Menunggu Kelulusan', // Menunggu Kelulusan / Diluluskan / Ditolak
                        'tarikh_daftar' => '2026-01-10',
                        'catatan_admin' => '',
                    ],
                    [
                        'id' => 2,
                        'nama_syarikat' => 'XYZ Holdings',
                        'no_ssm' => '201901112233',
                        'telefon' => '011-98765432',
                        'emel' => 'admin@xyz.com',
                        'status' => 'Menunggu Kelulusan',
                        'tarikh_daftar' => '2026-01-11',
                        'catatan_admin' => '',
                    ],
                ]
            ]);
        }

        $items = collect(session('employers', []));

        // Filter mudah
        $status = $request->get('status', 'Menunggu Kelulusan');
        if ($status) {
            $items = $items->where('status', $status);
        }

        // Carian mudah
        $q = trim((string) $request->get('q', ''));
        if ($q !== '') {
            $items = $items->filter(function ($e) use ($q) {
                $hay = strtolower(($e['nama_syarikat'] ?? '') . ' ' . ($e['no_ssm'] ?? '') . ' ' . ($e['emel'] ?? ''));
                return strpos($hay, strtolower($q)) !== false;
            });
        }

        $employers = $items->values()->all();

        return view('pages.admin.employer_approval.index', compact('employers', 'status', 'q'));
    }

    public function view($id)
    {
        $employers = session('employers', []);
        $employer = collect($employers)->firstWhere('id', (int) $id);

        if (!$employer) {
            return redirect()->route('admin.majikan.approval.index')->with('error', 'Rekod tidak ditemui.');
        }

        return view('pages.admin.employer_approval.view', compact('employer'));
    }

    public function approve(Request $request, $id)
    {
        $catatan = trim((string) $request->get('catatan_admin', ''));

        $employers = session('employers', []);
        foreach ($employers as &$e) {
            if ((int) $e['id'] === (int) $id) {
                $e['status'] = 'Diluluskan';
                $e['catatan_admin'] = $catatan;
                break;
            }
        }
        session(['employers' => $employers]);

        return redirect()->route('admin.majikan.approval.view', $id)->with('success', 'Pendaftaran syarikat telah diluluskan.');
    }

    public function reject(Request $request, $id)
    {
        $catatan = trim((string) $request->get('catatan_admin', ''));

        $employers = session('employers', []);
        foreach ($employers as &$e) {
            if ((int) $e['id'] === (int) $id) {
                $e['status'] = 'Ditolak';
                $e['catatan_admin'] = $catatan;
                break;
            }
        }
        session(['employers' => $employers]);

        return redirect()->route('admin.majikan.approval.view', $id)->with('success', 'Pendaftaran syarikat telah ditolak.');
    }
}
