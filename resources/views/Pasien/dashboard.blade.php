@extends('layouts.app')
@section('title', 'Dashboard Pasien')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Halo, {{ Auth::user()->nama }} 👋</h5>
        </div>
        <div class="card-body">
            <p class="text-muted">Jadwal Pemeriksaan Hari Ini:</p>

            @if($jadwalHariIni->count())
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Jam</th>
                            <th>Dokter</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwalHariIni as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->tgl_periksa)->format('H:i') }}</td>
                            <td>{{ $item->dokter->nama }}</td>
                            <td>
                                @if($item->catatan)
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info mb-0">Belum ada jadwal pemeriksaan hari ini.</div>
            @endif
        </div>
    </div>
</div>
@endsection
