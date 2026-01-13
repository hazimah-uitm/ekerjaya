@extends('layouts.master')

@section('content')

<h6 class="mb-4 text-uppercase">Dashboard Majikan</h6>

<div class="row row-cols-1 row-cols-md-4 g-3">

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Jumlah Jawatan</p>
                        <h4 class="my-1 text-primary">{{ $stats['jawatan'] }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-primary text-white ms-auto">
                        <i class="bx bx-briefcase"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Jumlah Permohonan</p>
                        <h4 class="my-1 text-success">{{ $stats['permohonan'] }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-success text-white ms-auto">
                        <i class="bx bx-user-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Permohonan Baharu</p>
                        <h4 class="my-1 text-warning">{{ $stats['baharu'] }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-warning text-white ms-auto">
                        <i class="bx bx-bell"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Disenarai Pendek</p>
                        <h4 class="my-1 text-danger">{{ $stats['shortlist'] }}</h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-danger text-white ms-auto">
                        <i class="bx bx-list-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<hr class="my-4">

<div class="card">
    <div class="card-body">
        <h6 class="mb-3">Tindakan Pantas</h6>

        <a href="{{ route('majikan.vacancy.index') }}" class="btn btn-primary me-2">
            Urus Jawatan Kosong
        </a>

        <a href="{{ route('majikan.application.index') }}" class="btn btn-outline-primary">
            Lihat Permohonan
        </a>
    </div>
</div>
@endsection
