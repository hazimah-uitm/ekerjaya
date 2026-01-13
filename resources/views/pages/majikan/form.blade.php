@extends('layouts.master')

@section('content')
<h6 class="mb-0 text-uppercase">{{ $str_mode }} Jawatan Kosong</h6>
<hr>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ $save_route }}">
            {{ csrf_field() }}

            <div class="mb-3">
                <label class="form-label">Tajuk Jawatan</label>
                <input type="text" name="tajuk" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Pekerjaan</label>
                <select name="jenis_pekerjaan" class="form-select">
                    <option value="">-- Pilih --</option>
                    <option>Sepenuh Masa</option>
                    <option>Separuh Masa</option>
                    <option>Latihan Industri</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tarikh Tutup</label>
                <input type="date" name="tarikh_tutup" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option>Aktif</option>
                    <option>Tidak Aktif</option>
                </select>
            </div>

            <button class="btn btn-primary">{{ $str_mode }}</button>
            <a href="{{ route('majikan.vacancy.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
