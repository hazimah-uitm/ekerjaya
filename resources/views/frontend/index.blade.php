@extends('layouts.frontend')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">

            {{-- Slide 1 --}}
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('public/frontend/assets/img/carousel-1.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">
                                    Cari Jawatan Kosong Yang Tepat Untuk Anda
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">
                                    Platform eKerjaya membantu anda mencari jawatan kosong, melihat maklumat jawatan,
                                    dan membuat permohonan dengan lebih mudah.
                                </p>
                                <a href="{{ route('jobs') }}"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                                    Lihat Jawatan Kosong
                                </a>
                                <a href="{{ route('register') }}"
                                    class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">
                                    Daftar Akaun
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('public/frontend/assets/img/carousel-2.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">
                                    Mohon Jawatan Dengan Lebih Cepat & Tersusun
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">
                                    Lengkapkan maklumat anda, cari jawatan mengikut kategori,
                                    dan hantar permohonan terus melalui sistem.
                                </p>
                                <a href="{{ route('jobs') }}"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                                    Cari Jawatan
                                </a>
                                <a href="{{ route('login') }}"
                                    class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">
                                    Log Masuk
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Carousel End -->


    <!-- Cari Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0"
                                placeholder="Kata kunci (contoh: jurutera, pembantu tadbir)" />
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0">
                                <option selected>Kategori</option>
                                <option value="1">Teknologi Maklumat</option>
                                <option value="2">Pentadbiran</option>
                                <option value="3">Kewangan</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0">
                                <option selected>Lokasi</option>
                                <option value="1">Samarahan</option>
                                <option value="2">Mukah</option>
                                <option value="3">Sibu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('jobs') }}" class="btn btn-dark border-0 w-100">
                        Cari Jawatan
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Cari End -->


    <!-- Kategori Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Terokai Mengikut Kategori</h1>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item rounded p-4" href="{{ route('category') }}">
                        <i class="fa fa-3x fa-laptop-code text-primary mb-4"></i>
                        <h6 class="mb-3">Teknologi Maklumat</h6>
                        <p class="mb-0">123 Jawatan</p>
                    </a>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item rounded p-4" href="{{ route('category') }}">
                        <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                        <h6 class="mb-3">Pentadbiran</h6>
                        <p class="mb-0">123 Jawatan</p>
                    </a>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="cat-item rounded p-4" href="{{ route('category') }}">
                        <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                        <h6 class="mb-3">Kewangan</h6>
                        <p class="mb-0">123 Jawatan</p>
                    </a>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item rounded p-4" href="{{ route('category') }}">
                        <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                        <h6 class="mb-3">Khidmat Pelanggan</h6>
                        <p class="mb-0">123 Jawatan</p>
                    </a>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('category') }}" class="btn btn-outline-primary py-2 px-4">
                    Lihat Semua Kategori
                </a>
            </div>
        </div>
    </div>
    <!-- Kategori End -->


    <!-- Tips Kerjaya Preview Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <div class="col-6 text-start">
                            <img class="img-fluid w-100" src="{{ asset('public/frontend/assets/img/about-1.jpg') }}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid" src="{{ asset('public/frontend/assets/img/about-2.jpg') }}"
                                style="width: 85%; margin-top: 15%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid" src="{{ asset('public/frontend/assets/img/about-3.jpg') }}"
                                style="width: 85%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100" src="{{ asset('public/frontend/assets/img/about-4.jpg') }}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Tips Kerjaya Untuk Pencari Kerja</h1>
                    <p class="mb-4">
                        Dapatkan panduan ringkas untuk menyediakan maklumat diri, kemahiran,
                        pengalaman, serta persediaan sebelum temuduga.
                    </p>
                    <p><i class="fa fa-check text-primary me-3"></i>Lengkapkan maklumat profil dengan tepat</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Tonjolkan kemahiran & pengalaman relevan</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Persediaan temuduga & etika profesional</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('about') }}">Baca Tips Kerjaya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Tips Kerjaya Preview End -->


    <!-- Jobs Start -->
    <div class="container-fliud py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Senarai Jawatan Kosong</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                            href="#tab-1">
                            <h6 class="mt-n1 mb-0">Jenis Pekerjaan</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                            <h6 class="mt-n1 mb-0">Sepenuh Masa</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                            <h6 class="mt-n1 mb-0">Separuh Masa</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                            <h6 class="mt-n1 mb-0">Latihan Industri</h6>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-1.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">
                                            <a href="{{ route('job.detail', 'software-engineer') }}"
                                                class="text-dark text-decoration-none">
                                                Software Engineer
                                            </a>
                                        </h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-2.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Marketing Manager</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-3.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Product Designer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-4.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Creative Director</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-5.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Wordpress Developer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5" href="">Lihat Lagi Jawatan</a>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-1.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Software Engineer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-2.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Marketing Manager</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-3.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Product Designer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-4.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Creative Director</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-5.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Wordpress Developer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5" href="">Lihat Lagi Jawatan Kosong</a>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-1.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Software Engineer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-2.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Marketing Manager</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-3.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Product Designer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-4.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Creative Director</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded"
                                        src="{{ asset('public/frontend/assets/img/com-logo-5.jpg') }}" alt=""
                                        style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">Wordpress Developer</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                        <span class="text-truncate me-3"><i
                                                class="far fa-clock text-primary me-2"></i>Sepenuh Masa</span>
                                        <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a>
                                        <a class="btn btn-primary" href="">Mohon Sekarang</a>
                                    </div>
                                    <small class="text-truncate"><i
                                            class="far fa-calendar-alt text-primary me-2"></i>Tarikh
                                        Tutup: 01 Jan, 2045</small>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5" href="">Lihat Lagi Jawatan Kosong</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
@endsection
