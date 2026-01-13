@extends('layouts.frontend')

@section('content')
@php
    // ===== PROTOTAIP: DATA PROFIL (SESSION / FALLBACK) =====
    $userName = session('user.name') ?? (auth()->user()->name ?? 'Nama Anda');
    $profile = session('profile') ?? [
        'no_ic' => '000000-00-0000',
        'telefon' => '01X-XXXXXXX',
        'email' => auth()->user()->email ?? 'contoh@email.com',
        'alamat' => 'Alamat ringkas (Prototaip)',
        'poskod' => '00000',
        'bandar' => 'Kuching',
        'negeri' => 'Sarawak',

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

    // Link – adjust ikut route edit kau yang sedia ada.
    // Kalau edit kau pakai /profile/{id}/edit, guna auth()->id()
    $editUrl = route('profile.edit', auth()->id()); // <-- ini guna route existing kau
@endphp

<div class="container-fluid py-5 bg-light">
    <div class="container">

        {{-- Header --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Profil Saya</h2>
            </div>

            <div class="d-flex gap-2 mt-3 mt-md-0">
                <a href="{{ route('profile.frontend') }}" class="btn btn-primary">
                    <i class="fa fa-edit me-2"></i> Kemaskini Profil
                </a>
                <a href="{{ route('resume.pdf') }}" class="btn btn-outline-danger">
                    <i class="fa fa-file-pdf me-2"></i> Muat Turun Resume (PDF)
                </a>
            </div>
        </div>

        <div class="row g-4">
            {{-- Kiri: Kad ringkas (contact) --}}
            <div class="col-lg-4">
                <div class="bg-white border rounded p-4 shadow-sm">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width:52px;height:52px;">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="mb-0">{{ $userName }}</h5>
                            <div class="text-muted small">Pencari Kerja</div>
                        </div>
                    </div>

                    <hr>

                    <div class="small text-muted mb-2">Maklumat Peribadi</div>
                    <div class="mb-2"><strong>No. IC:</strong> {{ $profile['no_ic'] }}</div>
                    <div class="mb-2"><strong>No. Telefon:</strong> {{ $profile['telefon'] }}</div>
                    <div class="mb-2"><strong>Email:</strong> {{ $profile['email'] }}</div>

                    <hr>

                    <div class="small text-muted mb-2">Alamat</div>
                    <div class="mb-1">{{ $profile['alamat'] }}</div>
                    <div class="text-muted small">{{ $profile['poskod'] }}, {{ $profile['bandar'] }}, {{ $profile['negeri'] }}</div>

                    <hr>

                    <div class="small text-muted mb-2">Kemahiran</div>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($profile['kemahiran'] as $skill)
                            <span class="badge bg-light text-dark border">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Kanan: Resume view --}}
            <div class="col-lg-8">
                <div class="bg-white border rounded p-4 shadow-sm">

                    {{-- Ringkasan --}}
                    <h5 class="mb-2">Ringkasan Profil</h5>
                    <p class="text-muted mb-4">{{ $profile['ringkasan'] }}</p>

                    {{-- Pendidikan --}}
                    <h5 class="mb-3">Pendidikan</h5>
                    @forelse($profile['pendidikan'] as $edu)
                        <div class="border rounded p-3 mb-3">
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="fw-semibold">{{ $edu['institusi'] }}</div>
                                <div class="text-muted small">{{ $edu['tahun'] }}</div>
                            </div>
                            <div class="text-muted">{{ $edu['tahap'] }} — {{ $edu['bidang'] }}</div>
                        </div>
                    @empty
                        <div class="text-muted">Tiada rekod pendidikan.</div>
                    @endforelse

                    {{-- Pengalaman --}}
                    <h5 class="mb-3 mt-4">Pengalaman</h5>
                    @forelse($profile['pengalaman'] as $exp)
                        <div class="border rounded p-3 mb-3">
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="fw-semibold">{{ $exp['jawatan'] }}</div>
                                <div class="text-muted small">{{ $exp['tahun'] }}</div>
                            </div>
                            <div class="text-muted">{{ $exp['organisasi'] }}</div>
                            <div class="mt-2">{{ $exp['huraian'] }}</div>
                        </div>
                    @empty
                        <div class="text-muted">Tiada pengalaman lagi.</div>
                    @endforelse

                    {{-- Projek / Aktiviti --}}
                    <h5 class="mb-3 mt-4">Projek / Aktiviti</h5>
                    @forelse($profile['projek'] as $p)
                        <div class="border rounded p-3 mb-3">
                            <div class="fw-semibold">{{ $p['tajuk'] }}</div>
                            <div class="text-muted">{{ $p['huraian'] }}</div>
                        </div>
                    @empty
                        <div class="text-muted">Tiada projek.</div>
                    @endforelse

                    {{-- Bahasa --}}
                    <h5 class="mb-3 mt-4">Bahasa</h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($profile['bahasa'] as $b)
                            <span class="badge bg-secondary">{{ $b }}</span>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
