@extends('layouts.master')

@section('content')
<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Pengurusan Jawatan Kosong</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Senarai Jawatan Kosong</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('majikan.vacancy.create') }}" class="btn btn-primary">
                Tambah Jawatan
            </a>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<h6 class="mb-0 text-uppercase">Senarai Jawatan Kosong</h6>
<hr />

<div class="card">
    <div class="card-body">

        {{-- alert success (kalau style kampus ada, kau boleh kekalkan ikut template asal) --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th style="width:5%;">#</th>
                        <th>Tajuk Jawatan</th>
                        <th>Lokasi</th>
                        <th>Jenis</th>
                        <th>Tarikh Tutup</th>
                        <th style="width:12%;">Status</th>
                        <th style="width:18%;">Tindakan</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($items as $key => $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->tajuk ?? $row['tajuk'] ?? '-' }}</td>
                            <td>{{ $row->lokasi ?? $row['lokasi'] ?? '-' }}</td>
                            <td>{{ $row->jenis_pekerjaan ?? $row['jenis_pekerjaan'] ?? '-' }}</td>
                            <td>{{ $row->tarikh_tutup ?? $row['tarikh_tutup'] ?? '-' }}</td>
                            <td>
                                @php
                                    $status = $row->publish_status ?? $row['publish_status'] ?? 'Tidak Aktif';
                                @endphp
                                <span class="badge {{ $status == 'Aktif' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('majikan.vacancy.show', $row->id ?? $row['id']) }}"
                                   class="btn btn-sm btn-info">
                                    Lihat
                                </a>

                                <a href="{{ route('majikan.vacancy.edit', $row->id ?? $row['id']) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <a href=""
                                   class="btn btn-sm btn-danger">
                                    Padam
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tiada rekod.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
