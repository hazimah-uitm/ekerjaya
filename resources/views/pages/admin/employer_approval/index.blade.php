@extends('layouts.master')

@section('content')
<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Pengurusan Majikan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Kelulusan Pendaftaran</li>
            </ol>
        </nav>
    </div>
</div>
<!-- End Breadcrumb -->

<h6 class="mb-0 text-uppercase">Kelulusan Pendaftaran Majikan</h6>
<hr />

<div class="card">
    <div class="card-body">

        {{-- Filter --}}
        <form method="GET" action="{{ route('admin.majikan.approval.index') }}" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text" name="q" class="form-control" placeholder="Carian (nama syarikat/SSM/emel)" value="{{ $q ?? '' }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="Menunggu Kelulusan" {{ ($status ?? '')=='Menunggu Kelulusan' ? 'selected' : '' }}>Menunggu Kelulusan</option>
                    <option value="Diluluskan" {{ ($status ?? '')=='Diluluskan' ? 'selected' : '' }}>Diluluskan</option>
                    <option value="Ditolak" {{ ($status ?? '')=='Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100">Tapis</button>
            </div>
            <div class="col-md-3 text-end">
                <a href="{{ route('admin.majikan.approval.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th>Nama Syarikat</th>
                        <th style="width: 15%;">No. SSM</th>
                        <th style="width: 18%;">E-mel</th>
                        <th style="width: 15%;">Tarikh Daftar</th>
                        <th style="width: 14%;">Status</th>
                        <th style="width: 10%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employers as $i => $e)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td class="fw-bold">{{ $e['nama_syarikat'] }}</td>
                        <td>{{ $e['no_ssm'] }}</td>
                        <td>{{ $e['emel'] }}</td>
                        <td>{{ $e['tarikh_daftar'] }}</td>
                        <td>
                            @if($e['status'] === 'Menunggu Kelulusan')
                                <span class="badge bg-warning text-dark">Menunggu Kelulusan</span>
                            @elseif($e['status'] === 'Diluluskan')
                                <span class="badge bg-success">Diluluskan</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.majikan.approval.view', $e['id']) }}" class="btn btn-sm btn-outline-primary">
                                Lihat
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Tiada rekod (Prototaip).</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
