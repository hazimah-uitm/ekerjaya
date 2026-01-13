@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="text-center">
                    <div class="d-flex align-items-center justify-content-center flex-column flex-md-row mb-4">
                        <img src="{{ asset('public/assets/images/putih.png') }}" class="logo-icon-login" alt="logo icon">
                        <div class="ms-3">
                            <h4 class="logo-text-login mb-0">eKERJAYA</h4>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 justify-content-center">
                    <div class="col mx-auto">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="border p-2 rounded">
                                    <div class="text-center mb-4 text-uppercase">
                                        <h5 class="text-primary fw-semibold">{{ __('Pendaftaran Berjaya') }}</h5>
                                    </div>

                                    <div class="text-center mb-3">
                                        <p class="mb-2">
                                            {{ __('
                                                                                        Sila periksa e-mel anda dan klik pautan pengesahan sebelum log masuk ke sistem.') }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
