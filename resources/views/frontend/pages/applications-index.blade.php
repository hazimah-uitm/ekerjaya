@extends('layouts.frontend')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Permohonan Saya</h1>
        <span class="text-muted">
            {{ count(session('applications', [])) }} permohonan
        </span>
    </div>

    @if(session('applications') && count(session('applications')) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width:5%;">#</th>
                        <th>Jawatan</th>
                        <th style="width:20%;">Tarikh Mohon</th>
                        <th style="width:20%;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('applications') as $i => $app)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $app['jawatan'] }}</td>
                            <td>{{ $app['tarikh_mohon'] }}</td>
                            <td>
                                @if($app['status'] === 'Dihantar')
                                    <span class="badge bg-warning text-dark">Dihantar</span>
                                @elseif($app['status'] === 'Disenarai Pendek')
                                    <span class="badge bg-info">Disenarai Pendek</span>
                                @elseif($app['status'] === 'Ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @elseif($app['status'] === 'Diterima')
                                    <span class="badge bg-success">Diterima</span>
                                @else
                                    <span class="badge bg-secondary">{{ $app['status'] }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            Anda belum membuat sebarang permohonan jawatan.
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('main') }}" class="btn btn-primary">
            Cari Jawatan
        </a>
    </div>
</div>
@endsection
