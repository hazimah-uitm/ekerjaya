@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center min-vh-100 py-4">
            <div class="container-fluid">
                <div class="text-center">
                    <div class="d-flex align-items-center justify-content-center flex-column flex-md-row mb-4">
                        <img src="{{ asset('public/assets/images/putih.png') }}" class="logo-icon-login" alt="logo icon">
                        <div class="ms-3">
                            <h4 class="logo-text-login mb-0">eKERJAYA</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="col mx-auto">
                        <div class="card shadow mb-4">
                            <div class="card-body p-4">
                                <div class="border p-4 rounded">

                                    {{-- HEADER (akan berubah ikut pilihan) --}}
                                    <div class="text-center mb-4" id="account-registration">
                                        <h5 class="text-primary fw-semibold mb-1" id="registerTitle">DAFTAR AKAUN PENCARI KERJA</h5>
                                        <div class="text-muted small" id="registerSubtitle">
                                            Daftar untuk mohon jawatan dan kemas kini profil anda.
                                        </div>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @if ($errors->count() == 1)
                                                <p class="mb-0">{!! $errors->first() !!}</p>
                                            @else
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{!! $error !!}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('register.store') }}">
                                        {{ csrf_field() }}

                                        {{-- PILIH JENIS AKAUN (TABS) --}}
                                        <ul class="nav nav-pills nav-fill mb-3" id="registerTypeTabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" type="button" id="tab-jobseeker" data-type="jobseeker">
                                                    Pencari Kerja
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" type="button" id="tab-employer" data-type="employer">
                                                    Majikan
                                                </button>
                                            </li>
                                        </ul>

                                        {{-- value ni yang controller guna untuk assignRole --}}
                                        <input type="hidden" name="register_as" id="register_as"
                                            value="{{ old('register_as', 'jobseeker') }}">

                                        @if ($errors->has('register_as'))
                                            <div class="text-danger small mb-2">
                                                @foreach ($errors->get('register_as') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif

                                        {{-- FORM FIELD (sentiasa nampak) --}}
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label for="name" class="form-label">Nama Penuh</label>
                                                <input type="text"
                                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                    id="name" name="name" value="{{ old('name') }}" required>
                                                @if ($errors->has('name'))
                                                    <div class="invalid-feedback">
                                                        @foreach ($errors->get('name') as $error)
                                                            {{ $error }}
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-12">
                                                <label for="email" class="form-label">Alamat Emel</label>
                                                <input type="email"
                                                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                    id="email" name="email" value="{{ old('email') }}" required>
                                                @if ($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        @foreach ($errors->get('email') as $error)
                                                            {{ $error }}
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label for="password" class="form-label">Kata Laluan</label>
                                                <input type="password"
                                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                    id="password" name="password" required>
                                                @if ($errors->has('password'))
                                                    <div class="invalid-feedback">
                                                        @foreach ($errors->get('password') as $error)
                                                            {{ $error }}
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label for="password-confirm" class="form-label">Sahkan Kata Laluan</label>
                                                <input type="password" class="form-control" id="password-confirm"
                                                    name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="text-end mt-3 mb-0">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="bx bxs-user-plus"></i> Daftar Akaun
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <p class="mb-0">Anda sudah mempunyai akaun? <a href="{{ route('login') }}">Log Masuk</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('register_as');
            const tabJob = document.getElementById('tab-jobseeker');
            const tabEmp = document.getElementById('tab-employer');

            const title = document.getElementById('registerTitle');
            const subtitle = document.getElementById('registerSubtitle');

            const meta = {
                jobseeker: {
                    title: 'DAFTAR AKAUN PENCARI KERJA',
                    subtitle: 'Daftar untuk mohon jawatan dan kemas kini profil anda.'
                },
                employer: {
                    title: 'DAFTAR AKAUN MAJIKAN',
                    subtitle: 'Daftar untuk iklankan jawatan dan urus permohonan calon.'
                }
            };

            function setActive(type) {
                input.value = type;

                tabJob.classList.toggle('active', type === 'jobseeker');
                tabEmp.classList.toggle('active', type === 'employer');

                title.textContent = meta[type].title;
                subtitle.textContent = meta[type].subtitle;
            }

            // Restore old value (kalau validation fail)
            const current = input.value || 'jobseeker';
            setActive(current);

            tabJob.addEventListener('click', function() {
                setActive('jobseeker');
            });

            tabEmp.addEventListener('click', function() {
                setActive('employer');
            });
        });
    </script>
@endsection
