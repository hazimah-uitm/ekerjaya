@extends('layouts.frontend')

@section('content')
@php
    // ====== PROTOTAIP: DATA STATIK (NO DB) ======
    $userName = session('user.name') ?? (auth()->user()->name ?? 'Pengguna');
    $profileComplete = (bool) (session('user.profile_complete') ?? false);

    // status: draf / dihantar / dalam_semakan / berjaya / tidak_berjaya
    $applications = [
        [
            'jawatan' => 'Software Engineer',
            'majikan' => 'ABC Technologies',
            'lokasi'  => 'Kuching, Sarawak',
            'jenis'   => 'Sepenuh Masa',
            'tarikh'  => '2026-01-10',
            'status'  => 'dalam_semakan',
            'slug'    => 'software-engineer',
        ],
        [
            'jawatan' => 'Pegawai Sokongan IT (Intern)',
            'majikan' => 'TechCom Sdn Bhd',
            'lokasi'  => 'Samarahan, Sarawak',
            'jenis'   => 'Latihan Industri',
            'tarikh'  => '2026-01-05',
            'status'  => 'dihantar',
            'slug'    => 'pegawai-sokongan-it-intern',
        ],
        [
            'jawatan' => 'Pembantu Tadbir',
            'majikan' => 'Syarikat Contoh',
            'lokasi'  => 'Miri, Sarawak',
            'jenis'   => 'Separuh Masa',
            'tarikh'  => '2025-12-22',
            'status'  => 'tidak_berjaya',
            'slug'    => 'pembantu-tadbir',
        ],
    ];

    $statusLabel = [
        'draf' => ['label' => 'Draf', 'class' => 'secondary'],
        'dihantar' => ['label' => 'Dihantar', 'class' => 'info'],
        'dalam_semakan' => ['label' => 'Dalam Semakan', 'class' => 'warning'],
        'berjaya' => ['label' => 'Berjaya', 'class' => 'success'],
        'tidak_berjaya' => ['label' => 'Tidak Berjaya', 'class' => 'danger'],
    ];

    $total = count($applications);
    $menunggu = collect($applications)->whereIn('status', ['dihantar','dalam_semakan'])->count();
    $berjaya = collect($applications)->where('status','berjaya')->count();
    $tidakBerjaya = collect($applications)->where('status','tidak_berjaya')->count();

    // Link prototaip — adjust ikut route kau
    $linkProfile = route('profile.frontend');     // page profil (edit)
    $linkPermohonan = route('applications.index'); // page senarai permohonan
@endphp

<div class="container-fluid py-5 bg-light">
    <div class="container">

        {{-- Header --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Dashboard Pencari Kerja</h2>
                <div class="text-muted">
                    Selamat datang, <strong>{{ $userName }}</strong>
                </div>
            </div>

            <div class="d-flex gap-2 mt-3 mt-md-0">
                <a href="{{ route('jobs') }}" class="btn btn-primary">
                    <i class="fa fa-search me-2"></i> Cari Jawatan
                </a>
                <a href="{{ $linkProfile }}" class="btn btn-outline-primary">
                    <i class="fa fa-user-edit me-2"></i> Profil Saya
                </a>
            </div>
        </div>

        {{-- Alert status profil --}}
        @if(!$profileComplete)
            <div class="alert alert-warning d-flex flex-wrap justify-content-between align-items-center">
                <div class="me-3">
                    <strong>Profil belum lengkap.</strong>
                    Lengkapkan profil untuk memudahkan permohonan jawatan dan penjanaan resume.
                </div>
                <a href="{{ $linkProfile }}" class="btn btn-warning">
                    Lengkapkan Profil
                </a>
            </div>
        @else
            <div class="alert alert-success d-flex flex-wrap justify-content-between align-items-center">
                <div class="me-3">
                    <strong>Profil lengkap.</strong> Anda boleh memohon jawatan dan muat turun resume bila-bila masa.
                </div>
                <a href="{{ route('resume.pdf') }}" class="btn btn-success">
                    <i class="fa fa-file-pdf me-2"></i> Muat Turun Resume (PDF)
                </a>
            </div>
        @endif

        {{-- KPI cards --}}
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="bg-white border rounded p-3 h-100">
                    <div class="text-muted small">Jumlah Permohonan</div>
                    <div class="fs-2 fw-bold">{{ $total }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white border rounded p-3 h-100">
                    <div class="text-muted small">Menunggu / Semakan</div>
                    <div class="fs-2 fw-bold">{{ $menunggu }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white border rounded p-3 h-100">
                    <div class="text-muted small">Berjaya</div>
                    <div class="fs-2 fw-bold">{{ $berjaya }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white border rounded p-3 h-100">
                    <div class="text-muted small">Tidak Berjaya</div>
                    <div class="fs-2 fw-bold">{{ $tidakBerjaya }}</div>
                </div>
            </div>
        </div>

        {{-- Main content --}}
        <div class="row g-4">
            {{-- Permohonan terkini --}}
            <div class="col-lg-8">
                <div class="bg-white border rounded p-4 h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Permohonan Terkini</h5>
                        <a href="{{ $linkPermohonan }}" class="btn btn-sm btn-outline-secondary">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Jawatan</th>
                                    <th>Majikan</th>
                                    <th>Tarikh Mohon</th>
                                    <th>Status</th>
                                    <th class="text-end">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $a)
                                    @php
                                        $badge = $statusLabel[$a['status']] ?? ['label'=>'Tidak Diketahui','class'=>'secondary'];
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="fw-semibold">{{ $a['jawatan'] }}</div>
                                            <div class="text-muted small">
                                                <i class="fa fa-map-marker-alt me-1"></i>{{ $a['lokasi'] }}
                                                &nbsp;•&nbsp;
                                                <i class="far fa-clock me-1"></i>{{ $a['jenis'] }}
                                            </div>
                                        </td>
                                        <td>{{ $a['majikan'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($a['tarikh'])->format('d M Y') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $badge['class'] }}">
                                                {{ $badge['label'] }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('job.detail', $a['slug']) }}" class="btn btn-sm btn-outline-primary">
                                                Lihat Jawatan
                                            </a>

                                            @if($a['status'] === 'draf')
                                                <a href="{{ route('job.apply', $a['slug']) }}" class="btn btn-sm btn-primary">
                                                    Sambung Mohon
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            Tiada permohonan lagi. Klik <strong>Cari Jawatan</strong> untuk mula memohon.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3 text-muted small">
                        * Ini adalah paparan prototaip (data statik di Blade, tanpa pangkalan data).
                    </div>
                </div>
            </div>

            {{-- Quick actions / Tips --}}
            <div class="col-lg-4">
                <div class="bg-white border rounded p-4 mb-4">
                    <h5 class="mb-3">Capaian Pantas</h5>
                    <div class="d-grid gap-2">
                        <a href="{{ route('jobs') }}" class="btn btn-primary">
                            <i class="fa fa-briefcase me-2"></i> Jawatan Kosong
                        </a>
                        <a href="{{ $linkPermohonan }}" class="btn btn-outline-primary">
                            <i class="fa fa-list me-2"></i> Permohonan Saya
                        </a>
                        <a href="{{ $linkProfile }}" class="btn btn-outline-secondary">
                            <i class="fa fa-id-card me-2"></i> Kemaskini Profil
                        </a>
                        <a href="{{ route('about') }}" class="btn btn-light border">
                            <i class="fa fa-lightbulb me-2"></i> Tips Kerjaya
                        </a>
                    </div>
                </div>

                <div class="bg-white border rounded p-4">
                    <h5 class="mb-3">Tips Ringkas</h5>
                    <ul class="mb-0">
                        <li class="mb-2">Pastikan maklumat telefon & emel tepat.</li>
                        <li class="mb-2">Lengkapkan pendidikan dan kemahiran untuk resume.</li>
                        <li class="mb-2">Semak status permohonan secara berkala.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
