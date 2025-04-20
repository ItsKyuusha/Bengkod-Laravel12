@extends('layouts.app')
@section('title', 'Riwayat Pemeriksaan')

@section('content')
<div class="container">
    <h3>Riwayat Pemeriksaan</h3>

    @if($riwayat->isEmpty())
        <div class="alert alert-info">Belum ada riwayat pemeriksaan.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pasien</th>
                    <th>Tanggal</th>
                    <th>Catatan</th>
                    <th>Obat</th>
                    <th>Total Biaya</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riwayat as $item)
                    <tr>
                        <td>{{ $item->pasien->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tgl_periksa)->format('d M Y H:i') }}</td>
                        <td>{{ $item->catatan }}</td>
                        <td>
                            @foreach($item->obats as $obat)
                                <span class="badge bg-info">{{ $obat->nama_obat }}</span>
                            @endforeach
                        </td>
                        <td>Rp{{ number_format($item->biaya_periksa, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
