@extends('layouts.master')

@section('content')
    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Profil Majikan</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Maklumat Profil</li>
                </ol>
            </nav>
        </div>

        <div class="ms-auto">
            <a href="{{ route('majikan.profile.edit') }}">
                <button type="button" class="btn btn-primary mt-2 mt-lg-0">Kemaskini Profil</button>
            </a>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <h6 class="mb-0 text-uppercase">Maklumat Profil Majikan</h6>
    <hr />

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th style="width: 35%;">Nama Syarikat</th>
                            <td>{{ $profile['nama_syarikat'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>No. SSM</th>
                            <td>{{ $profile['no_ssm'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>No. Telefon</th>
                            <td>{{ $profile['telefon'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>E-mel</th>
                            <td>{{ $profile['emel'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Laman Web</th>
                            <td>{{ $profile['website'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $profile['alamat'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Ringkasan</th>
                            <td>{{ $profile['ringkasan'] ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
