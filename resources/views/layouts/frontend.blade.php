<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eKerjaya</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('public/frontend/assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('public/frontend/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('public/frontend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fliud bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="{{ route('main') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">eKerjaya</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            @php
                $isSeeker = auth()->check() && auth()->user()->hasRole('Pencari Kerja');
                $isBackoffice =
                    auth()->check() &&
                    auth()
                        ->user()
                        ->hasAnyRole(['Admin', 'Superadmin', 'Super Admin', 'Majikan']);
            @endphp

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('main') }}"
                        class="nav-item nav-link {{ request()->routeIs('main') ? 'active' : '' }}">Utama</a>
                    <a href="{{ route('about') }}"
                        class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tips Kerjaya</a>
                    <a href="{{ route('jobs') }}"
                        class="nav-item nav-link {{ request()->routeIs('jobs') ? 'active' : '' }}">Jawatan Kosong</a>
                    <a href="{{ route('contact') }}"
                        class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Hubungi Kami</a>
                </div>

                {{-- BUTANG KANAN --}}
                @if (!session()->has('user'))
                    <div class="d-flex align-items-center d-none d-lg-flex ms-3">
                        <a href="{{ route('register') }}" class="btn btn-secondary rounded-0 py-4 px-lg-4">
                            Daftar
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-4">
                            Log Masuk
                        </a>
                    </div>
                @else
                    <div class="d-flex align-items-center d-none d-lg-flex ms-3">
                        <div class="dropdown">
                            <a href="#" class="btn btn-light border rounded-0 py-4 px-lg-4 dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user-circle text-primary me-2"></i>
                                {{ session('user.name') ?? (auth()->user()->name ?? 'Pengguna') }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end rounded-0">
                                @if ($isSeeker)
                                    <li><a class="dropdown-item" href="{{ route('dashboard.frontend') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('applications.index') }}">Permohonan
                                            Saya</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profile.view') }}">Profil Saya</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endif

                                @if ($isBackoffice)
                                    <li><a class="dropdown-item" href="{{ route('home') }}">Admin / Majikan</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endif

                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                                        {{ csrf_field() }}
                                        <button type="submit" class="dropdown-item text-danger">
                                            Log Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </nav>
        <!-- Navbar End -->


        @yield('content')


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer wow fadeIn" data-wow-delay="0.1s">
            {{-- <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Company</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Your email">
                            <button type="button"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3 mb-md-0">
                            &copy; 2026 <a class="border-bottom" href="#">UiTM Cawangan Sarawak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/frontend/assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('public/frontend/assets/js/main.js') }}"></script>
</body>

</html>
