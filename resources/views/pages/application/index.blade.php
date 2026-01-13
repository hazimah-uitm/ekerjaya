@extends('layouts.master')

@section('content')
<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Pengurusan Permohonan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Senarai Permohonan
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- End Breadcrumb -->

<h6 class="mb-0 text-uppercase">Senarai Permohonan Jawatan</h6>
<hr />

<div class="card">
    <div class="card-body">

        {{-- alert --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width:5%">#</th>
                        <th>Nama Pemohon</th>
                        <th>Jawatan Dipohon</th>
                        <th>Tarikh Mohon</th>
                        <th style="width:15%">Status</th>
                        <th style="width:15%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($items as $row)
                        @php
                            // support object / array (prototype)
                            $nama   = $row->nama ?? $row['nama'] ?? '-';
                            $jawatan = $row->jawatan ?? $row['jawatan'] ?? '-';
                            $tarikh = $row->tarikh_mohon ?? $row['tarikh_mohon'] ?? '-';
                            $status = $row->status ?? $row['status'] ?? 'Baharu';
                        @endphp

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $nama }}</td>
                            <td>{{ $jawatan }}</td>
                            <td>{{ $tarikh }}</td>
                            <td>
                                <span class="badge
                                    @if($status == 'Baharu') bg-primary
                                    @elseif($status == 'Disenarai Pendek') bg-warning
                                    @elseif($status == 'Ditolak') bg-danger
                                    @else bg-secondary
                                    @endif
                                ">
                                    {{ $status }}
                                </span>
                            </td>
                            <td>
                                {{-- untuk demo, satu button je --}}
                                <a href="#" class="btn btn-sm btn-info">
                                    Lihat
                                </a>
                                <a href="#" class="btn btn-sm btn-warning">
                                    Kemaskini Status
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Tiada permohonan direkodkan.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
