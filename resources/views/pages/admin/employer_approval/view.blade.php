@extends('layouts.master')

@section('content')
<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Pengurusan Majikan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.majikan.approval.index') }}">Kelulusan Pendaftaran</a></li>
                <li class="breadcrumb-item active" aria-current="page">Butiran</li>
            </ol>
        </nav>
    </div>
</div>
<!-- End Breadcrumb -->

<h6 class="mb-0 text-uppercase">Butiran Pendaftaran Majikan</h6>
<hr />

<div class="row g-3">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-3">Maklumat Syarikat</h6>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Syarikat</label>
                        <input type="text" class="form-control" value="{{ $employer['nama_syarikat'] }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. SSM</label>
                        <input type="text" class="form-control" value="{{ $employer['no_ssm'] }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Telefon</label>
                        <input type="text" class="form-control" value="{{ $employer['telefon'] }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">E-mel</label>
                        <input type="text" class="form-control" value="{{ $employer['emel'] }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tarikh Daftar</label>
                        <input type="text" class="form-control" value="{{ $employer['tarikh_daftar'] }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" value="{{ $employer['status'] }}" readonly>
                    </div>
                </div>

                <div class="mb-0">
                    <label class="form-label">Catatan Admin (jika ada)</label>
                    <textarea class="form-control" rows="3" readonly>{{ $employer['catatan_admin'] }}</textarea>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-3">Tindakan Kelulusan</h6>

                <form method="POST" action="{{ route('admin.majikan.approval.approve', $employer['id']) }}" class="mb-3">
                    {{ csrf_field() }}
                    <label class="form-label">Catatan (optional)</label>
                    <textarea name="catatan_admin" class="form-control" rows="3" placeholder="Contoh: Dokumen lengkap. Diluluskan."></textarea>
                    <button class="btn btn-success mt-2 w-100">
                        Luluskan Pendaftaran
                    </button>
                </form>

                <form method="POST" action="{{ route('admin.majikan.approval.reject', $employer['id']) }}">
                    {{ csrf_field() }}
                    <label class="form-label">Sebab Ditolak (wajib untuk demo)</label>
                    <textarea name="catatan_admin" class="form-control" rows="3" placeholder="Contoh: No. SSM tidak sah / Maklumat tidak lengkap"></textarea>
                    <button class="btn btn-danger mt-2 w-100">
                        Tolak Pendaftaran
                    </button>
                </form>

                <a href="{{ route('admin.majikan.approval.index') }}" class="btn btn-outline-secondary w-100 mt-3">
                    Kembali
                </a>

            </div>
        </div>
    </div>
</div>

@endsection
