@extends('layouts.master')

@section('content')

<h6 class="mb-4 text-uppercase">Dashboard Admin</h6>

{{-- Kad Statistik --}}
<div class="row row-cols-1 row-cols-md-4 g-3">

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Pencari Kerja</p>
                        <h4 class="my-1 text-primary">{{ $stats['jumlah_pencari'] ?? 0 }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-primary text-white ms-auto">
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <small class="text-muted d-block mt-2">Jumlah pengguna berdaftar.</small>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Majikan</p>
                        <h4 class="my-1 text-success">{{ $stats['jumlah_majikan'] ?? 0 }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-success text-white ms-auto">
                        <i class="bx bx-building-house"></i>
                    </div>
                </div>
                <small class="text-muted d-block mt-2">Jumlah majikan berdaftar.</small>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Jawatan Aktif</p>
                        <h4 class="my-1 text-warning">{{ $stats['jawatan_aktif'] ?? 0 }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-warning text-white ms-auto">
                        <i class="bx bx-briefcase"></i>
                    </div>
                </div>
                <small class="text-muted d-block mt-2">Jawatan masih dibuka.</small>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Permohonan Baharu</p>
                        <h4 class="my-1 text-danger">{{ $stats['permohonan_baharu'] ?? 0 }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-danger text-white ms-auto">
                        <i class="bx bx-bell"></i>
                    </div>
                </div>
                <small class="text-muted d-block mt-2">Perlu semakan segera.</small>
            </div>
        </div>
    </div>

</div>

<hr class="my-4">

<div class="row g-3">

    {{-- Jawatan Terkini --}}
    <div class="col-12 col-lg-6">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Jawatan Terkini</h6>
                    <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>

                <hr>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Jawatan</th>
                                <th>Majikan</th>
                                <th>Status</th>
                                <th class="text-end">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestVacancies ?? [] as $v)
                                <tr>
                                    <td class="fw-bold">{{ $v['tajuk'] }}</td>
                                    <td>{{ $v['majikan'] }}</td>
                                    <td>
                                        @if(($v['status'] ?? '') === 'Aktif')
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ $v['view_url'] ?? '#' }}" class="btn btn-sm btn-outline-secondary">
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        Tiada data jawatan (Prototaip).
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- Permohonan Terkini --}}
    <div class="col-12 col-lg-6">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="mb-0">Permohonan Terkini</h6>
                    <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>

                <hr>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Pemohon</th>
                                <th>Jawatan</th>
                                <th>Status</th>
                                <th class="text-end">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestApplications ?? [] as $a)
                                <tr>
                                    <td class="fw-bold">{{ $a['nama'] }}</td>
                                    <td>{{ $a['jawatan'] }}</td>
                                    <td>
                                        @php $st = $a['status'] ?? 'Baharu'; @endphp
                                        @if($st === 'Baharu')
                                            <span class="badge bg-warning text-dark">Baharu</span>
                                        @elseif($st === 'Dalam Semakan')
                                            <span class="badge bg-info text-dark">Dalam Semakan</span>
                                        @elseif($st === 'Disenarai Pendek')
                                            <span class="badge bg-success">Disenarai Pendek</span>
                                        @elseif($st === 'Ditolak')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $st }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ $a['view_url'] ?? '#' }}" class="btn btn-sm btn-outline-secondary">
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        Tiada data permohonan (Prototaip).
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
