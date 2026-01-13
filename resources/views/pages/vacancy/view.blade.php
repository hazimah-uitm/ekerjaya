@extends('layouts.master')

@section('content')
<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Pengurusan Jawatan Kosong</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('majikan.vacancy.index') }}">Senarai Jawatan Kosong</a></li>
                <li class="breadcrumb-item active" aria-current="page">Maklumat Jawatan</li>
            </ol>
        </nav>
    </div>
</div>
<!-- End Breadcrumb -->

<h6 class="mb-0 text-uppercase">Maklumat Jawatan Kosong</h6>
<hr />

@php
    // support object atau array (prototype)
    $tajuk = $item->tajuk ?? $item['tajuk'] ?? '-';
    $lokasi = $item->lokasi ?? $item['lokasi'] ?? '-';
    $jenis = $item->jenis_pekerjaan ?? $item['jenis_pekerjaan'] ?? '-';
    $tarikh = $item->tarikh_tutup ?? $item['tarikh_tutup'] ?? '-';
    $status = $item->publish_status ?? $item['publish_status'] ?? 'Tidak Aktif';

    // field tambahan kalau ada (optional)
    $kategori = $item->kategori ?? $item['kategori'] ?? '-';
    $gaji = $item->gaji ?? $item['gaji'] ?? '-';
    $ringkasan = $item->ringkasan ?? $item['ringkasan'] ?? '-';
@endphp

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th width="30%">Tajuk Jawatan</th>
                <td>{{ $tajuk }}</td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>{{ $kategori }}</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>{{ $lokasi }}</td>
            </tr>
            <tr>
                <th>Jenis Pekerjaan</th>
                <td>{{ $jenis }}</td>
            </tr>
            <tr>
                <th>Gaji (Jika Ada)</th>
                <td>{{ $gaji }}</td>
            </tr>
            <tr>
                <th>Tarikh Tutup Permohonan</th>
                <td>{{ $tarikh }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <span class="badge {{ $status == 'Aktif' ? 'bg-success' : 'bg-secondary' }}">
                        {{ $status }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Ringkasan / Penerangan</th>
                <td style="white-space: pre-line;">{{ $ringkasan }}</td>
            </tr>
        </table>

        <a href="{{ route('majikan.vacancy.index') }}" class="btn btn-secondary">
            Kembali
        </a>

        {{-- kalau route edit dah ada --}}
        @if(Route::has('majikan.vacancy.edit'))
            <a href="{{ route('majikan.vacancy.edit', $item->id ?? $item['id']) }}" class="btn btn-warning">
                Edit
            </a>
        @endif

    </div>
</div>
@endsection
