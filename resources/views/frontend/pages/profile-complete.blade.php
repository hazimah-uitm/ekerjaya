@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <div class="bg-white p-4 p-md-5 rounded shadow-sm">

                <div class="d-flex align-items-start justify-content-between flex-wrap gap-2 mb-3">
                    <div>
                        <h3 class="mb-1">Lengkapkan Profil</h3>
                        <p class="text-muted mb-0">
                            Sila lengkapkan maklumat di bawah untuk membolehkan anda memohon jawatan.
                        </p>
                    </div>
                </div>

                <hr class="my-4">

                <form method="POST" action="{{ route('profile.complete.submit') }}">
                    {{ csrf_field() }}

                    {{-- =======================================
                        A. Maklumat Peribadi
                    ======================================== --}}
                    <h5 class="mb-3">A. Maklumat Peribadi</h5>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Penuh</label>
                            <input type="text" name="nama_penuh" class="form-control" placeholder="Contoh: Ali Bin Ahmad"
                                   value="{{ old('nama_penuh') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">No. Kad Pengenalan</label>
                            <input type="text" name="no_ic" class="form-control" placeholder="Contoh: 900101-13-1234"
                                   value="{{ old('no_ic') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tarikh Lahir</label>
                            <input type="date" name="tarikh_lahir" class="form-control" value="{{ old('tarikh_lahir') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">No. Telefon</label>
                            <input type="text" name="telefon" class="form-control" placeholder="Contoh: 01X-XXXXXXX"
                                   value="{{ old('telefon') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">E-mel</label>
                            <input type="email" name="email" class="form-control" placeholder="Contoh: nama@email.com"
                                   value="{{ old('email') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kewarganegaraan</label>
                            <input type="text" name="kewarganegaraan" class="form-control" placeholder="Contoh: Malaysia"
                                   value="{{ old('kewarganegaraan', 'Malaysia') }}">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3"
                                      placeholder="Alamat semasa">{{ old('alamat') }}</textarea>
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- =======================================
                        B. Ringkasan Profesional / Objektif
                    ======================================== --}}
                    <h5 class="mb-3">B. Ringkasan Profesional</h5>
                    <div class="mb-3">
                        <label class="form-label">Ringkasan (2–4 ayat)</label>
                        <textarea name="ringkasan" class="form-control" rows="4"
                                  placeholder="Contoh: Graduan ... berminat dalam ... mempunyai kemahiran ...">{{ old('ringkasan') }}</textarea>
                        <small class="text-muted">Ringkasan ini akan digunakan dalam eksport resume.</small>
                    </div>

                    <hr class="my-4">

                    {{-- =======================================
                        C. Pendidikan
                    ======================================== --}}
                    <h5 class="mb-3">C. Pendidikan</h5>

                    <div class="table-responsive mb-2">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 18%;">Tahun</th>
                                    <th style="width: 30%;">Institusi</th>
                                    <th style="width: 30%;">Program / Kelulusan</th>
                                    <th style="width: 22%;">Keputusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i<3; $i++)
                                <tr>
                                    <td>
                                        <input type="text" name="pendidikan[{{ $i }}][tahun]" class="form-control"
                                               placeholder="Contoh: 2020–2024">
                                    </td>
                                    <td>
                                        <input type="text" name="pendidikan[{{ $i }}][institusi]" class="form-control"
                                               placeholder="Contoh: UiTM">
                                    </td>
                                    <td>
                                        <input type="text" name="pendidikan[{{ $i }}][program]" class="form-control"
                                               placeholder="Contoh: Ijazah Sarjana Muda ...">
                                    </td>
                                    <td>
                                        <input type="text" name="pendidikan[{{ $i }}][keputusan]" class="form-control"
                                               placeholder="Contoh: CGPA 3.50">
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <small class="text-muted">* Prototaip: sediakan 3 baris dahulu. Nanti kita buat tambah baris dinamik.</small>

                    <hr class="my-4">

                    {{-- =======================================
                        D. Pengalaman Kerja / Latihan Industri
                    ======================================== --}}
                    <h5 class="mb-3">D. Pengalaman Kerja / Latihan Industri</h5>

                    <div class="table-responsive mb-2">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 18%;">Tempoh</th>
                                    <th style="width: 22%;">Jawatan</th>
                                    <th style="width: 28%;">Organisasi</th>
                                    <th style="width: 32%;">Ringkasan Tugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0; $i<3; $i++)
                                <tr>
                                    <td>
                                        <input type="text" name="pengalaman[{{ $i }}][tempoh]" class="form-control"
                                               placeholder="Contoh: Jun 2024 – Ogos 2024">
                                    </td>
                                    <td>
                                        <input type="text" name="pengalaman[{{ $i }}][jawatan]" class="form-control"
                                               placeholder="Contoh: Pelatih / Pembantu IT">
                                    </td>
                                    <td>
                                        <input type="text" name="pengalaman[{{ $i }}][organisasi]" class="form-control"
                                               placeholder="Contoh: Syarikat ABC">
                                    </td>
                                    <td>
                                        <textarea name="pengalaman[{{ $i }}][tugas]" class="form-control" rows="2"
                                                  placeholder="Contoh: Membantu ... menyelenggara ..."></textarea>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>

                    <hr class="my-4">

                    {{-- =======================================
                        E. Kemahiran
                    ======================================== --}}
                    <h5 class="mb-3">E. Kemahiran</h5>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Kemahiran Teknikal</label>
                            <textarea name="kemahiran_teknikal" class="form-control" rows="4"
                                      placeholder="Contoh: PHP, Laravel, MySQL, HTML, CSS, JavaScript...">{{ old('kemahiran_teknikal') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kemahiran Insaniah</label>
                            <textarea name="kemahiran_insaniah" class="form-control" rows="4"
                                      placeholder="Contoh: Komunikasi, Kepimpinan, Kerja Berpasukan...">{{ old('kemahiran_insaniah') }}</textarea>
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- =======================================
                        F. Bahasa
                    ======================================== --}}
                    <h5 class="mb-3">F. Bahasa</h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Bahasa Melayu</label>
                            <select name="bahasa[melayu]" class="form-select">
                                <option value="">Pilih</option>
                                <option>Asas</option>
                                <option>Baik</option>
                                <option>Cemerlang</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bahasa Inggeris</label>
                            <select name="bahasa[inggeris]" class="form-select">
                                <option value="">Pilih</option>
                                <option>Asas</option>
                                <option>Baik</option>
                                <option>Cemerlang</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Lain-lain</label>
                            <input type="text" name="bahasa[lain]" class="form-control" placeholder="Contoh: Mandarin">
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- =======================================
                        G. Sijil / Kursus / Aktiviti
                    ======================================== --}}
                    <h5 class="mb-3">G. Sijil / Kursus / Aktiviti</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Sijil / Kursus (ringkas)</label>
                            <textarea name="sijil" class="form-control" rows="4"
                                      placeholder="Contoh: Cisco CCNA (2024), Kursus ...">{{ old('sijil') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Aktiviti / Pencapaian</label>
                            <textarea name="aktiviti" class="form-control" rows="4"
                                      placeholder="Contoh: AJK program..., Anugerah...">{{ old('aktiviti') }}</textarea>
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- =======================================
                        H. Rujukan
                    ======================================== --}}
                    <h5 class="mb-3">H. Rujukan</h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Nama Rujukan</label>
                            <input type="text" name="rujukan[nama]" class="form-control" placeholder="Contoh: Dr. ...">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jawatan / Organisasi</label>
                            <input type="text" name="rujukan[jawatan]" class="form-control" placeholder="Contoh: Pensyarah UiTM">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">No. Telefon / E-mel</label>
                            <input type="text" name="rujukan[hubungan]" class="form-control" placeholder="Contoh: 01X... / email">
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- =======================================
                        Butang
                    ======================================== --}}
                    <div class="d-flex flex-wrap gap-2 justify-content-end">
                        <a href="{{ route('main') }}" class="btn btn-light">
                            Simpan Kemudian
                        </a>
                        <button class="btn btn-primary">
                            Simpan & Teruskan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
