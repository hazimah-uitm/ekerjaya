@extends('layouts.master')

@section('content')
<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Pengurusan Jawatan Kosong</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('majikan.vacancy.index') }}">Senarai Jawatan Kosong</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $str_mode }} Jawatan Kosong
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- End Breadcrumb -->

<h6 class="mb-0 text-uppercase">{{ $str_mode }} Jawatan Kosong</h6>
<hr />

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ $save_route }}">
            {{ csrf_field() }}

            {{-- Tajuk Jawatan --}}
            <div class="mb-3">
                <label for="tajuk" class="form-label">Tajuk Jawatan</label>
                <input type="text"
                    class="form-control {{ $errors->has('tajuk') ? 'is-invalid' : '' }}"
                    id="tajuk"
                    name="tajuk"
                    value="{{ old('tajuk') ?? ($vacancy->tajuk ?? '') }}">

                @if ($errors->has('tajuk'))
                    <div class="invalid-feedback">
                        @foreach ($errors->get('tajuk') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Lokasi --}}
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi Jawatan</label>
                <input type="text"
                    class="form-control {{ $errors->has('lokasi') ? 'is-invalid' : '' }}"
                    id="lokasi"
                    name="lokasi"
                    value="{{ old('lokasi') ?? ($vacancy->lokasi ?? '') }}">
            </div>

            {{-- Jenis Pekerjaan --}}
            <div class="mb-3">
                <label for="jenis_pekerjaan" class="form-label">Jenis Pekerjaan</label>
                <select name="jenis_pekerjaan"
                    class="form-select {{ $errors->has('jenis_pekerjaan') ? 'is-invalid' : '' }}">
                    <option value="">-- Pilih --</option>
                    <option value="Sepenuh Masa"
                        {{ (old('jenis_pekerjaan') ?? ($vacancy->jenis_pekerjaan ?? '')) == 'Sepenuh Masa' ? 'selected' : '' }}>
                        Sepenuh Masa
                    </option>
                    <option value="Separuh Masa"
                        {{ (old('jenis_pekerjaan') ?? ($vacancy->jenis_pekerjaan ?? '')) == 'Separuh Masa' ? 'selected' : '' }}>
                        Separuh Masa
                    </option>
                    <option value="Latihan Industri"
                        {{ (old('jenis_pekerjaan') ?? ($vacancy->jenis_pekerjaan ?? '')) == 'Latihan Industri' ? 'selected' : '' }}>
                        Latihan Industri
                    </option>
                </select>
            </div>

            {{-- Tarikh Tutup --}}
            <div class="mb-3">
                <label for="tarikh_tutup" class="form-label">Tarikh Tutup Permohonan</label>
                <input type="date"
                    class="form-control {{ $errors->has('tarikh_tutup') ? 'is-invalid' : '' }}"
                    id="tarikh_tutup"
                    name="tarikh_tutup"
                    value="{{ old('tarikh_tutup') ?? ($vacancy->tarikh_tutup ?? '') }}">
            </div>

            {{-- Status --}}
            <div class="mb-3">
                <label class="form-label">Status Jawatan</label>

                <div class="form-check">
                    <input type="radio" id="aktif" name="publish_status" value="Aktif"
                        {{ ($vacancy->publish_status ?? '') == 'Aktif' ? 'checked' : '' }}>
                    <label class="form-check-label" for="aktif">Aktif</label>
                </div>

                <div class="form-check">
                    <input type="radio" id="tidak_aktif" name="publish_status" value="Tidak Aktif"
                        {{ ($vacancy->publish_status ?? '') == 'Tidak Aktif' ? 'checked' : '' }}>
                    <label class="form-check-label" for="tidak_aktif">Tidak Aktif</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ $str_mode }}</button>
        </form>
    </div>
</div>
@endsection
