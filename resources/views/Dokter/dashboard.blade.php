@extends('layouts.app')
@section('title', 'Dashboard Dokter')

@section('content')
<div class="container">
    <h3>Jadwal Periksa Hari Ini</h3>

    @if($jadwalHariIni->isEmpty())
        <div class="alert alert-info">Belum ada jadwal periksa hari ini.</div>
    @else
        <table class="table table-bordered">
            <thead>
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
                            <a href="{{ route('dokter.periksa.form', $periksa->id) }}" class="btn btn-primary btn-sm">Periksa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
