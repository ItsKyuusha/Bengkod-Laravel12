@extends('layouts.app')
@section('title', 'Daftar Pemeriksaan')

@section('content')
<div class="container">
    <h3>Daftar Pemeriksaan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($data->isEmpty())
        <div class="alert alert-info">Belum ada pasien untuk diperiksa.</div>
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
                            <a href="{{ route('dokter.periksa.form', $periksa->id) }}" class="btn btn-success btn-sm">Periksa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
