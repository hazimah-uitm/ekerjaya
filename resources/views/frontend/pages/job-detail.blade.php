
@extends('layouts.frontend')

@section('content')
<div class="container-fluid py-5 bg-light">
    <div class="container">

        {{-- Tajuk --}}
        <div class="row mb-4">
            <div class="col">
                <h1 class="mb-2">Software Engineer</h1>
                <p class="text-muted">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i> New York, USA
                    &nbsp; | &nbsp;
                    <i class="far fa-clock text-primary me-2"></i> Sepenuh Masa
                </p>
            </div>
        </div>

        <div class="row g-4">
            {{-- Kiri: Maklumat Jawatan --}}
            <div class="col-lg-8">
                <div class="bg-white p-4 rounded shadow-sm">

                    <h5 class="mb-3">Maklumat Jawatan</h5>
                    <p>
                        Kami sedang mencari Software Engineer untuk menyertai pasukan pembangunan
                        sistem. Calon perlu mempunyai kemahiran asas pengaturcaraan dan
                        mampu bekerja secara berpasukan.
                    </p>

                    <h6 class="mt-4">Tanggungjawab</h6>
                    <ul>
                        <li>Membangunkan dan menyelenggara sistem</li>
                        <li>Bekerjasama dengan pasukan teknikal</li>
                        <li>Menyelesaikan isu berkaitan aplikasi</li>
                    </ul>

                    <h6 class="mt-4">Kelayakan</h6>
                    <ul>
                        <li>Diploma / Ijazah dalam bidang berkaitan</li>
                        <li>Pengalaman asas dalam pembangunan perisian</li>
                        <li>Berdisiplin dan bertanggungjawab</li>
                    </ul>
                </div>
            </div>

            {{-- Kanan: Ringkasan & Tindakan --}}
            <div class="col-lg-4">
                <div class="bg-white p-4 rounded shadow-sm">

                    <h5 class="mb-3">Ringkasan Jawatan</h5>

                    <p><strong>Gaji:</strong> $123 – $456</p>
                    <p><strong>Tarikh Tutup:</strong> 01 Jan 2045</p>
                    <p><strong>Majikan:</strong> ABC Technologies</p>

                    <div class="d-grid mt-4">
                        <a href="{{ route('job.apply', $slug) }}" class="btn btn-primary btn-lg">
                            Mohon Jawatan
                        </a>
                    </div>

                    @guest
                    <small class="text-muted d-block mt-3">
                        * Log masuk diperlukan untuk memohon
                    </small>
                    @endguest
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
