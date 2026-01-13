@extends('layouts.frontend')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Tips Kerjaya</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item">
                        <a href="{{ route('main') }}">Utama</a>
                    </li>
                    <li class="breadcrumb-item text-white active" aria-current="page">
                        Tips Kerjaya
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->

    <!-- Tips Kerjaya Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <div class="col-6 text-start">
                            <img class="img-fluid w-100" src="{{ asset('public/frontend/assets/img/about-1.jpg') }}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid"
                                 src="{{ asset('public/frontend/assets/img/about-2.jpg') }}"
                                 style="width: 85%; margin-top: 15%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid"
                                 src="{{ asset('public/frontend/assets/img/about-3.jpg') }}"
                                 style="width: 85%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100"
                                 src="{{ asset('public/frontend/assets/img/about-4.jpg') }}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">
                        Panduan & Tips Untuk Membantu Anda Mendapatkan Pekerjaan
                    </h1>

                    <p class="mb-4">
                        Bahagian ini menyediakan panduan asas dan tips kerjaya untuk membantu
                        pencari kerja membuat persediaan sebelum memohon jawatan kosong melalui
                        sistem eKerjaya.
                    </p>

                    <p>
                        <i class="fa fa-check text-primary me-3"></i>
                        Cara menyediakan maklumat diri dan latar belakang akademik dengan lengkap
                    </p>
                    <p>
                        <i class="fa fa-check text-primary me-3"></i>
                        Panduan menulis pengalaman kerja dan kemahiran yang relevan
                    </p>
                    <p>
                        <i class="fa fa-check text-primary me-3"></i>
                        Tips menghadiri temuduga dan etika profesional
                    </p>

                    <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('jobs') }}">
                        Lihat Jawatan Kosong
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Tips Kerjaya End -->
@endsection
