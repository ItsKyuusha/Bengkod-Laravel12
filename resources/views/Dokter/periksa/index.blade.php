@extends('layouts.app')
@section('title', 'Daftar Pemeriksaan')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Daftar Pasien Menunggu Pemeriksaan</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($data->isEmpty())
                <div class="alert alert-info mb-0">Belum ada pasien yang menunggu pemeriksaan.</div>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pasien</th>
                            <th>Jadwal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $periksa)
                            <tr>
                                <td>{{ $periksa->pasien->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d M Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('dokter.periksa.form', $periksa->id) }}" class="btn btn-sm btn-success">Periksa</a>
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
