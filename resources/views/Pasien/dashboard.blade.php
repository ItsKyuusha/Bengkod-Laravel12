@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Halo, {{ Auth::user()->nama }}</h3>
    <p>Jadwal Pemeriksaan Hari Ini:</p>

    @if($jadwalHariIni->count())
    <table class="table table-striped">
        <thead>
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
    <div class="alert alert-info">Belum ada jadwal hari ini.</div>
    @endif
</div>
@endsection
