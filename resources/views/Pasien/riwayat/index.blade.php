@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Riwayat Pemeriksaan</h4>

    @if($riwayat->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Dokter</th>
                <th>Catatan</th>
                <th>Obat</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayat as $item)
            <tr>
                <td>{{ \Carbon\Carbon::parse($item->tgl_periksa)->format('d M Y H:i') }}</td>
                <td>{{ $item->dokter->nama }}</td>
                <td>{{ $item->catatan }}</td>
                <td>
                    @foreach($item->obats as $obat)
                        <li>{{ $obat->nama_obat }}</li>
                    @endforeach
                </td>
                <td>Rp {{ number_format($item->biaya_periksa) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">Belum ada riwayat pemeriksaan.</div>
    @endif
</div>
@endsection
