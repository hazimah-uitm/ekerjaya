@extends('layouts.master')

@section('content')

<h6 class="mb-4 text-uppercase">Dashboard Majikan</h6>

{{-- Stat Cards --}}
<div class="row row-cols-1 row-cols-md-4 g-3">

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Jumlah Jawatan</p>
                        <h4 class="my-1 text-primary">{{ $stats['jawatan'] ?? 0 }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-primary text-white ms-auto">
                        <i class="bx bx-briefcase"></i>
                    </div>
                </div>
                <small class="text-muted d-block mt-2">Jumlah jawatan yang anda siarkan.</small>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Jumlah Permohonan</p>
                        <h4 class="my-1 text-success">{{ $stats['permohonan'] ?? 0 }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-success text-white ms-auto">
                        <i class="bx bx-user-check"></i>
                    </div>
                </div>
                <small class="text-muted d-block mt-2">Jumlah permohonan diterima.</small>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Permohonan Baharu</p>
                        <h4 class="my-1 text-warning">{{ $stats['baharu'] ?? 0 }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-warning text-white ms-auto">
                        <i class="bx bx-bell"></i>
                    </div>
                </div>
                <small class="text-muted d-block mt-2">Permohonan yang baru diterima.</small>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Disenarai Pendek</p>
                        <h4 class="my-1 text-danger">{{ $stats['shortlist'] ?? 0 }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-danger text-white ms-auto">
                        <i class="bx bx-list-check"></i>
                    </div>
                </div>
                <small class="text-muted d-block mt-2">Calon yang ditanda “shortlist”.</small>
            </div>
        </div>
    </div>

</div>

<div class="row g-3 mt-1">

    {{-- Profil Ringkas Majikan --}}
    <div class="col-12 col-lg-4">
        <div class="card radius-10">
            <div class="card-body">
                <h6 class="mb-3">Profil Majikan</h6>

                <div class="mb-2">
                    <small class="text-muted">Nama Syarikat</small>
                    <div class="fw-bold">{{ $profile['nama_syarikat'] ?? 'ABC Technologies Sdn. Bhd.' }}</div>
                </div>

                <div class="mb-2">
                    <small class="text-muted">E-mel</small>
                    <div>{{ $profile['emel'] ?? 'hr@abctech.com' }}</div>
                </div>

                <div class="mb-3">
                    <small class="text-muted">Telefon</small>
                    <div>{{ $profile['telefon'] ?? '01X-XXXXXXX' }}</div>
                </div>

                <a href="" class="btn btn-outline-primary btn-sm">
                    Lihat Profil
                </a>

                <a href="" class="btn btn-primary btn-sm">
                    Kemaskini Profil
                </a>
            </div>
        </div>
    </div>

    {{-- Senarai Jawatan Terkini --}}
    <div class="col-12 col-lg-8">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <h6 class="mb-0">Jawatan Terkini</h6>
                    <a href="{{ route('majikan.vacancy.index') }}" class="btn btn-primary btn-sm">
                        Urus Jawatan
                    </a>
                </div>

                <hr>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Jawatan</th>
                                <th>Jenis</th>
                                <th>Tarikh Tutup</th>
                                <th>Status</th>
                                <th class="text-end">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($vacancies ?? []) as $v)
                                <tr>
                                    <td class="fw-bold">{{ $v['tajuk'] }}</td>
                                    <td>{{ $v['jenis'] }}</td>
                                    <td>{{ $v['tutup'] }}</td>
                                    <td>
                                        @if(($v['status'] ?? '') === 'Aktif')
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ $v['view_url'] ?? '#' }}" class="btn btn-sm btn-outline-secondary">Lihat</a>
                                        <a href="{{ $v['edit_url'] ?? '#' }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
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

</div>

{{-- Permohonan Terkini --}}
<div class="card radius-10 mt-3">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <h6 class="mb-0">Permohonan Terkini</h6>
            <a href="{{ route('majikan.application.index') }}" class="btn btn-outline-primary btn-sm">
                Lihat Semua Permohonan
            </a>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Pemohon</th>
                        <th>Jawatan Dipohon</th>
                        <th>Tarikh Mohon</th>
                        <th>Status</th>
                        <th class="text-end">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(($applications ?? []) as $a)
                        <tr>
                            <td class="fw-bold">{{ $a['nama'] }}</td>
                            <td>{{ $a['jawatan'] }}</td>
                            <td>{{ $a['tarikh'] }}</td>
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
                                <a href="{{ $a['view_url'] ?? '#' }}" class="btn btn-sm btn-outline-secondary">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Tiada data permohonan (Prototaip).
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
