@extends('layouts.app')
@section('title', 'Dashboard Dokter')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Jadwal Periksa Hari Ini</h5>
        </div>
        <div class="card-body">
            @if($jadwalHariIni->isEmpty())
                <div class="alert alert-info mb-0">Belum ada jadwal periksa hari ini.</div>
            @else
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Pasien</th>
                            <th>Jadwal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwalHariIni as $periksa)
                        <tr>
                            <td>{{ $periksa->pasien->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d M Y H:i') }}</td>
                            <td>
                                <a href="{{ route('dokter.periksa.form', $periksa->id) }}" class="btn btn-sm btn-primary">Periksa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
